<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modelId;
    public $nombre, $orden;
    public $search;

    

    public function mount()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'orden' => 'required',
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
        $data = Categoria::find($this->modelId);
        $this->modalFormVisible = true;
        $this->nombre = $data->nombre;
        $this->orden = $data->orden;
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
            'orden' => $this->orden,
        ];
    }

    public function create()
    {
        $this->validate();
        Categoria::create($this->modelData());
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Nueva Categoría :D',
            'eventMessage' => 'Categoría creada correctamente!'
        ]);
        $this->reset();
    }

    public function read()
    {
        return Categoria::paginate(5);
    }

    public function update()
    {
        $this->validate();
        Categoria::where('id', $this->modelId)
            ->update($this->modelData());
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Categoría actualizada :D',
            'eventMessage' => 'La cagegoría "' . $this->nombre . '" fue actualizada!'
        ]);
        $this->reset();
    }

    public function delete()
    {
        Categoria::destroy($this->modelId);
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Categoría eliminada :,(',
            'eventMessage' => 'La categoría "' . $this->modelId . '" fue eliminada!'
        ]);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.categorias', [
            'categorias' => Categoria::where('id', 'LIKE', "%{$this->search}%")->orWhere('nombre', 'LIKE', "%{$this->search}%")->latest()->paginate(10),
        ]);
    }
}
