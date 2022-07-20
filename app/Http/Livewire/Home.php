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
        $this->categorias = Categoria::whereHas('productos', function ($query) {
            $query->where('estado', 1);
        })->orderBy('orden', 'asc')->get();
        $this->productos = Producto::where('estado', 1)->get();
        return view('livewire.home')->layout('layouts.guest');
    }
}
