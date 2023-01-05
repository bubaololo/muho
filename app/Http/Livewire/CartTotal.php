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

        $subtotal = \Cart::getSubTotal();
        $rawDelivery = (string)\Cart::getConditionsByType('shipping');
        preg_match('/\d+/', $rawDelivery, $deliveryEntries);
        if ($deliveryEntries) {
            $delivery = $deliveryEntries[0];
        } else {
            $delivery = 150;
        }
        
        $total = \Cart::getTotal();


        return view('livewire.cart-total', compact('subtotal', 'delivery', 'total'));
    }
}
