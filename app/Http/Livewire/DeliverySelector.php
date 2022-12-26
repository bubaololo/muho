<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Darryldecode\Cart\CartCondition;

class DeliverySelector extends Component
{
    public $deliveryType = 'post';
    private $shipping;

    public function render()
    {
        info($this->deliveryType);

        \Cart::clearCartConditions();

        switch ($this->deliveryType) {
            case 'post':
                $this->shipping = new CartCondition([
                    'name' => 'Post',
                    'type' => 'shipping',
                    'target' => 'total',
                    'value' => '+150',
                    'attributes' => array()
                ]);
                break;
            case 'avito':
                $this->shipping = new CartCondition([
                    'name' => 'Avito',
                    'type' => 'shipping',
                    'target' => 'total',
                    'value' => '+250',
                    'attributes' => array()
                ]);
                break;
            case 'sdek':
                $this->shipping = new CartCondition([
                    'name' => 'Sdek',
                    'type' => 'shipping',
                    'target' => 'total',
                    'value' => '+300',
                    'attributes' => array()
                ]);
        }

        \Cart::condition($this->shipping);

        $this->emit('shipping_set');
        return view('livewire.delivery-selector');

    }

//enum Shipping
//{
//    case Post;
//    case Sdek;
//    case Avito;
//
//}

    public function setDelivery($deliveryType)
    {


    }
}
