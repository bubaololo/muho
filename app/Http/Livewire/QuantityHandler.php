<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuantityHandler extends Component
{
    public $quantity;
    public function render()
    {
        return view('livewire.quantity-handler');
    }
}
