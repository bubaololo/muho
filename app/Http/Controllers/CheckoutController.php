<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
//        dd(session()->all());
        return view('checkout');
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
            
        $tg = app()->make('App\Services\TelegramService');
        $tg->sendMessage('новый заказ!, номер заказа: ' . $orderNum . "\r\n" . "\r\n" .
            'Товары:' . "\r\n" .
            $cartItemsString . "\r\n" . "\r\n" .
            'Инфа для доставки: ' . "\r\n" .
            $deliveryDataString
        );
        \Cart::clear();
        return view('order', compact('cartItems', 'deliveryInfo', 'orderNum', 'subtotal', 'deliveryPrice', 'deliveryType', 'total'));
    }
}

