<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeliveryCostController extends Controller
{
    public function getDeliveryCost(Request $request)
    {
        
        $input = $request->all();
        try {
            $city = $input['city'];
            
            $cdek_client = new \AntistressStore\CdekSDK2\CdekClientV2('TEST');
            
            $request = (new \AntistressStore\CdekSDK2\Entity\Requests\Location())->setCountryCodes('RU,TR')->setCity($city);
            $response = $cdek_client->getCities($request);
            $code = $response[0]->getCode();
            
            $tariff = (new \AntistressStore\CdekSDK2\Entity\Requests\Tariff())
                ->setTariffCode(137)
//            ->setTariffCode(368)
                ->setCityCodes(268, $code) // Экспресс-метод установки кодов отправителя и получателя
                ->setPackageWeight(100)
                ->addServices(['PART_DELIV']);
            
            $tariff_response = $cdek_client->calculateTariff($tariff);
            
            $deliveryCost = $tariff_response->getTotalSum() * 1.5;
            session(['cdek' => $deliveryCost]);
        } catch (AntistressStore\CdekSDK2\Exceptions\CdekV2RequestException $exception) {
            Session::forget('cdek');
        }
        
        if (array_key_exists("post_index", $input)) {
            $post_index = $input['post_index'];
            $this->getPostDeliveryCost($post_index);
        } else {
            $coord = $input['coord'];
            $post_index = $this->getPostIndexByCoordinates($coord);
            if ($post_index) {
                $this->getPostDeliveryCost($post_index);
            } else {
                Session::forget('post');
            }
            
        }
//        Республика Башкортостан, Уфа, Владивостокская улица, 1/2, подъезд 1
        
    }
    
    public function getPostDeliveryCost($post_index): void
    {
        try {
            $postDeliveryResponce = Http::get("https://postprice.ru/engine/russia/api.php?from=644083&to=$post_index&mass=100&valuation=0&vat=0");
            $postDeliveryCost = json_decode($postDeliveryResponce->body(), true)['pkg'];
            session(['post' => $postDeliveryCost]);
        } catch (Throwable $e) {
            report($e);
            Session::forget('post');
        }
    }
    
    public function getPostIndexByCoordinates($coord)
    {
        $lat = $coord[0];
        $lon = $coord[1];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Token ' . env('DADATA_TOKEN'),
        ])->post('https://suggestions.dadata.ru/suggestions/api/4_1/rs/geolocate/postal_unit', [
            'lat' => $lat,
            'lon' => $lon,
            'radius_meters' => 1000
        ]);
        $postal_code = json_decode($response->body(), true)['suggestions'][0]['data']['postal_code'];
        return $postal_code;
    }
    
}