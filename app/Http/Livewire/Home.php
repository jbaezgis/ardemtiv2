<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;

class Home extends Component
{
    public $categorias;
    public $productos;

    public function render()
    {
        $this->categorias = Categoria::get();
        $this->productos = Producto::get();
        return view('livewire.home')->layout('layouts.guest');
    }
}
