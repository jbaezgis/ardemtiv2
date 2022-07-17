<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Venta;
use Livewire\WithPagination;
use Carbon\Carbon;

class Ventas extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modelId;
    public $fecha, $total;
    public $search;
    public $hoy;
    // Ventas suma
    public $ventasHoy, $ventasEstaSemana, $ventasEsteMes, $ventasUltimosTresMeses, $ventasEsteAno; 

    public function mount()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'fecha' => 'required',
            'total' => 'required',
        ];
    }

    public function resetSearch()
    {
        $this->search = '';
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
        $data = Venta::find($this->modelId);
        $this->modalFormVisible = true;
        $this->fecha = $data->fecha;
        $this->total = $data->total;
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDelete = true;
    }

    public function modelData()
    {
        return [
            'fecha' => $this->fecha,
            'total' => $this->total,
        ];
    }

    public function create()
    {
        $this->validate();
        Venta::create($this->modelData());
        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Nueva Categoría :D',
        //     'eventMessage' => 'Categoría creada correctamente!'
        // ]);
        $this->reset();
    }

    public function read()
    {
        return Venta::paginate(5);
    }

    public function update()
    {
        $this->validate();
        Venta::where('id', $this->modelId)
            ->update($this->modelData());
        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Categoría actualizada :D',
        //     'eventMessage' => 'La cagegoría "' . $this->nombre . '" fue actualizada!'
        // ]);
        $this->reset();
    }

    public function delete()
    {
        Venta::destroy($this->modelId);
        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Categoría eliminada :,(',
        //     'eventMessage' => 'La categoría "' . $this->modelId . '" fue eliminada!'
        // ]);
        $this->reset();
    }

    public function render()
    {
        
        // $this->hoy = Carbon::now();
        $this->ventasHoy = Venta::whereDate('fecha', Carbon::now())->sum('total');
        $this->ventasEstaSemana = Venta::whereBetween('fecha', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $this->ventasEsteMes = Venta::whereBetween('fecha', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total');
        // $this->ventasUltimosTresMeses = Venta::whereBetween('fecha', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $this->ventasEsteAno = Venta::whereBetween('fecha', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('total');

        return view('livewire.ventas', [
            'ventas' => Venta::where('fecha', 'LIKE', "%{$this->search}%")->latest()->paginate(10),
        ]);
    }
}
