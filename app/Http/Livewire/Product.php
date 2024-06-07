<?php

namespace App\Http\Livewire;
use Livewire\Component;


class Product extends Component
{

    public $data;

    public function mount()
    {
        $this->updateData();
    }

    public function updateDate()
    {
        $this->data = [
            'users' => \App\Models\User::count(), 
            'products' => \App\Models\Product::count(),
        ];
    }

    
    public function render()
    {
        

        return view('livewire.product');
    }
}
