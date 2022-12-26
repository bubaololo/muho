<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartTotal extends Component
{
    protected $subtotal;
    protected $shipping;
    protected $total;
    protected $listeners = ['quantity_updated' => 'render', 'shipping_set' => 'render'];

    public function render()
    {

       $subtotal= \Cart::getSubTotal();
       info($subtotal);
       $delivery= \Cart::getConditionsByType('shipping');
        info(print_r($delivery, true));
       $total= \Cart::getTotal();
        info($total);


        return view('livewire.cart-total', compact('subtotal','delivery','total'));
    }
}
