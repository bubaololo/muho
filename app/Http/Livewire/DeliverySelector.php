<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Darryldecode\Cart\CartCondition;

//enum Shipping
//{
//    case post;
//    case pdek;
//    case pvito;
//
//}

class DeliverySelector extends Component
{
    public $deliveryType;
    private $shipping;

    public function render()
    {


        \Cart::clearCartConditions();

    if($this->deliveryType) {
    
        match ($this->deliveryType) {
            'post' => $this->shipping = new CartCondition([
                'name' => 'Post',
                'type' => 'shipping',
                'target' => 'total',
                'value' => '+150',
                'attributes' => array()
            ]),
            'sdek' => $this->shipping = new CartCondition([
                'name' => 'Sdek',
                'type' => 'shipping',
                'target' => 'total',
                'value' => '+300',
                'attributes' => array()
            ]),
        
        };
    
        \Cart::condition($this->shipping);
    }
        $this->emit('shipping_set');
        return view('livewire.delivery-selector');

    }


    public function setDelivery($deliveryType)
    {


    }
}
