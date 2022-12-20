<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuantityHandler extends Component
{
    public $CartItem;
    public function render()
    {
        info(print_r($this->CartItem->quantity, true));
        return view('livewire.quantity-handler');

    }
}
