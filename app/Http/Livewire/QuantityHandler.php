<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuantityHandler extends Component
{
    public $CartItem;
    protected $listeners = ['quantity_updated' => 'render'];
    public function render()
    {
    $quantity = $this->CartItem['quantity'];
        return view('livewire.quantity-handler', compact('quantity'));

    }

    public function mount($CartItem) {
//        info(print_r($this->CartItem->id, true));
        $this->CartItem = $CartItem;
    }

    public function increment() {
        $this->CartItem['quantity'] = $this->CartItem['quantity'] + 1;
        \Cart::update(
            $this->CartItem['id'],
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $this->CartItem['quantity'],
                ],
            ]
        );
        $this->emit('quantity_updated');
    }
    public function decrement() {
        if($this->CartItem['quantity'] > 1) {
            info('decr');
            $this->CartItem['quantity'] = $this->CartItem['quantity'] - 1;
            \Cart::update(
                $this->CartItem['id'],
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $this->CartItem['quantity'],
                    ],
                ]
            );
            $this->emit('quantity_updated');
        }
    }
}
