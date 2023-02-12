<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Darryldecode\Cart\CartCondition;


class DeliverySelector extends Component
{
    public $deliveryType;
    private $shipping;
    protected $listeners = ['delivery_price_set' => 'render'];
    
    public function render()
    {
        \Cart::clearCartConditions();
        //check if we got real delivery price from api
        // to show prices on delivery select screen
        $cdekCalculatedDeliveryCost = session('cdek') ? session('cdek') : null;
        $postCalculatedDeliveryCost = session('post') ? session('post') : null;
        if ($this->deliveryType) {
            //also check if variables set
            // if not we set default prices
            $cdekDeliveryCost = session('cdek') ? session('cdek') : 800;
            $postDeliveryCost = session('post') ? session('post') : 350;
            match ($this->deliveryType) {
                'post' => $this->shipping = new CartCondition([
                    'name' => 'Post',
                    'type' => 'shipping',
                    'target' => 'total',
                    'value' => "+$postDeliveryCost",
                    'attributes' => array()
                ]),
                'sdek' => $this->shipping = new CartCondition([
                    'name' => 'Sdek',
                    'type' => 'shipping',
                    'target' => 'total',
                    'value' => "+$cdekDeliveryCost",
                    'attributes' => array()
                ]),
                
            };
            
            \Cart::condition($this->shipping);
        }
        
        
        $this->emit('shipping_set');
        return view('livewire.delivery-selector', compact('cdekCalculatedDeliveryCost', 'postCalculatedDeliveryCost'));
        
    }
    
    
    
    
//    public function mount(): void
//    {
//        if (session()->has('costs')) {
//            foreach (session('costs') as $cost) {
//                $this->receiveAlert($cost['type'], $cost['message']);
//            }
//            session()->forget('alerts');
//            $this->render();
//        }
//    }
    
    
}
