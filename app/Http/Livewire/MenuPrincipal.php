<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;

class MenuPrincipal extends Component
{
    protected $queryString = [
        'categoria' => ['except' => ''],
        // 'searchCategoria' => ['except' => ''],
    ];

    public $categorias;
    public $categoriasMenu;
    public $productos;
    public $categoria = '';

    public function render()
    {
        $this->categorias = Categoria::where('nombre', 'LIKE', "%{$this->categoria}%")->whereHas('productos', function ($query) {
            $query->where('estado', 1);
        })->orderBy('orden', 'asc')->get();
        $this->categoriasMenu = Categoria::whereHas('productos', function ($query) {
            $query->where('estado', 1);
        })->orderBy('orden', 'asc')->get();
        $this->productos = Producto::where('estado', 1)->get();
        return view('livewire.menu-principal')->layout('layouts.guest');
    }
}
