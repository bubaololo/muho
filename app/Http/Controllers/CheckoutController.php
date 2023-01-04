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

        info(print_r($request->all(),true));
//        info(print_r($request->ip(),true));
        info(print_r($validated,true));
        info(print_r($cartItems = \Cart::getContent(),true));
        return redirect(route('cart.list'))->with(['success' => 'заказ успешно оформлен, номер вашего заказа: ']);

    }
}
//'user_id',
//        'name',
//        'surname',
//        'middle_name',
//        'address',
//        'apartment',
//        'last_ip',
//        'comment'];
