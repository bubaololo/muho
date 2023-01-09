<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
    
        $user = Auth::user();
        $credentialsCheck = $user->credential()->first();
        
        if($credentialsCheck) {
            $credentials = $credentialsCheck;
            return view('cart', compact('cartItems','credentials'));
        }
        
        return view('cart', compact('cartItems'));
    }
    
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->image,
                'weight' => $request->weight,
            ],
        ]);
        session()->flash('success', 'Товар успешно добавлен в корзину!');
        
        return redirect()->route('cart.list');
    }
    
    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );
        
        session()->flash('success', 'Товар успешно обновлён!');
        
        return redirect()->route('cart.list');
    }
    
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Товар успешно удалён!');
        
        return redirect()->route('cart.list');
    }
    
    public function clearAllCart()
    {
        \Cart::clear();
        
        session()->flash('success', 'Корзина успешно очищена!');
        
        return redirect()->route('cart.list');
    }
}
