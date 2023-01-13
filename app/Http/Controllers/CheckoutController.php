<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Credential;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
//        info('yo');
//        if (Auth::check()) {
//            $user = Auth::user();
//            $credentialsCheck = $user->credential()->first();
//            info($credentialsCheck);
//            if($credentialsCheck) {
//                $credentials = $credentialsCheck;
//                return view('checkout', compact('credentials'));
//            }
//        }
//        return view('checkout');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate(['user_id' => 'nullable|exists:users,user_id',
            'name' => 'bail|alpha|required|max:50|string',
            'surname' => 'alpha_dash|required|max:50|string',
            'middle_name' => 'alpha|required|max:50|string',
            'address' => 'required',
            'telephone' => 'integer'
        ]);
        $orderNum = rand(10000, 99999);
        $total = \Cart::getTotal();
        $subtotal = \Cart::getSubTotal();
        $rawDelivery = (string)\Cart::getConditionsByType('shipping');
        preg_match('/\d+/', $rawDelivery, $deliveryPrice);
        $deliveryPrice = $deliveryPrice[0];
        preg_match('/(?<={")[^"]*/', $rawDelivery, $deliveryType);
        $deliveryType = $deliveryType[0];

//        info(print_r($request->all(),true));
//        info(print_r($request->ip(),true));
//        info(print_r($validated,true));
//        info(print_r($cartItems = \Cart::getContent(),true));
//        return redirect(route('cart.list'))->with(['success' => 'заказ успешно оформлен, номер вашего заказа: ']);
        $cartItems = \Cart::getContent();
        $deliveryInfo = $request->all();

//        preparing data to send via bot
        
        $cartItemsString = '';
        $itemCounter = 0;
        foreach ($cartItems as $item) {
            $itemCounter++;
            $cartItemsString = $cartItemsString . $itemCounter. "\r\n";
            $cartItemsString = $cartItemsString . $item['name']. "\r\n" .
              'Кол-во: ' . $item['quantity']. "\r\n" .
                'Вес: ' . $item['attributes']['weight']. "\r\n"
            ;
        }
        $deliveryDataString =   'Адрес: '.$deliveryInfo['address'] . "\r\n" .
            'квартира: '.$deliveryInfo['apartment'] . "\r\n" .
            'коммент: '.$deliveryInfo['comment'] . "\r\n" .
            'ФИО: '.$deliveryInfo['name'] .' ' . $deliveryInfo['surname'] . ' ' . $deliveryInfo['middle_name'] . "\r\n" .
            'телефон: '.$deliveryInfo['telephone'] . "\r\n" .
            'способ оплаты: '.$deliveryInfo['pay'];
            
//        $tg = app()->make('App\Services\TelegramService');
//        $tg->sendMessage('новый заказ!, номер заказа: ' . $orderNum . "\r\n" . "\r\n" .
//            'Товары:' . "\r\n" .
//            $cartItemsString . "\r\n" . "\r\n" .
//            'Инфа для доставки: ' . "\r\n" .
//            $deliveryDataString
//        );
        
//        store data
        
        $credential = Credential::create([
            'name' => $deliveryInfo['name'],
            'surname' => $deliveryInfo['surname'],
            'middle_name' => $deliveryInfo['middle_name'],
            'address' => $deliveryInfo['address'],
            'apartment' => $deliveryInfo['apartment'],
            'comment' => $deliveryInfo['comment'],
            'tel' => $deliveryInfo['telephone'],

        ]);
        
        $order = Order::create([
            'order_num' => $orderNum,
            'credential_id' => $credential->id,
            'total' => $total,
            'subtotal' => $subtotal,
            'delivery'=> $deliveryType,
            'delivery_cost'=> $deliveryPrice,
            'comment'=> $deliveryInfo['comment'],
        ]);
    
        if (Auth::check())
        {
            $user_id = Auth::user()->id;
            $order->user_id = $user_id;
            $order->save();
            
            $currentUserCredentials = Credential::where('user_id', $user_id)->first();
            if(!$currentUserCredentials){
            $credential->user_id = $user_id;
            $credential->save();
            }
        }
        
        foreach ($cartItems as $item) {
            $products = new OrderProduct;
            $products->order_id = $order->id;
            $products->product_id = $item['id'];
            $products->quantity = $item['quantity'];
            $products->save();
        }
        
        
        
        \Cart::clear();
        return view('order', compact('cartItems', 'deliveryInfo', 'orderNum', 'subtotal', 'deliveryPrice', 'deliveryType', 'total'));
    }
}

