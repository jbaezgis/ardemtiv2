<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria;

class Productos extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        // 'searchCategoria' => ['except' => ''],
    ];

    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modelId;
    public $imagen, $nombre, $descripcion, $precio, $categoria, $estado;
    public $search;
    // public $searchCategoria;
    public $categorias;

    public function mount()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            // 'descripcion' => 'required',
            'precio' => 'required',
            'categoria' => 'required',
            'estado' => 'required',
        ];
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();

        $this->modelId = $id;
        $data = Producto::find($this->modelId);
        $this->modalFormVisible = true;
        $this->nombre = $data->nombre;
        $this->descripcion = $data->descripcion;
        $this->precio = $data->precio;
        $this->categoria = $data->categoria;
        $this->estado = $data->estado;
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDelete = true;
    }

    public function modelData()
    {
        return [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'categoria' => $this->categoria,
            'estado' => $this->estado,
            'creado_por' => auth()->id(),
        ];
    }

    public function create()
    {
        $this->validate();
        Producto::create($this->modelData());
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Nuevo Producto :D',
            'eventMessage' => 'Producto creado exitosamente!'
        ]);
        $this->reset();
    }

    public function read()
    {
        return Producto::paginate(5);
    }

    public function update()
    {
        $this->validate();
        Producto::where('id', $this->modelId)
            ->update($this->modelData());
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Producto actualizado :D',
            'eventMessage' => 'El producto "' . $this->nombre . '" fue actualizado!'
        ]);
        $this->reset();
    }

    public function delete()
    {
        Producto::destroy($this->modelId);
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Producto eliminado :,(',
            'eventMessage' => 'El producto "' . $this->modelId . '" fue eliminado!'
        ]);
        $this->reset();
    }

    public function render()
    {
        $this->categorias = Categoria::all();

        return view('livewire.productos', [
            'productos' => Producto::where('id', 'LIKE', "%{$this->search}%")->orWhere('nombre', 'LIKE', "%{$this->search}%")->latest()->paginate(10),
        ]);
    }
}
