<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gasto;
use Livewire\WithPagination;
use Carbon\Carbon;

class Gastos extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modelId;
    public $fecha, $total, $observaciones;
    public $search;
    public $gastosHoy, $gastosEstaSemana, $gastosEsteMes, $gastosUltimosTresMeses, $gastosEsteAno; 

    public function mount()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'fecha' => 'required',
            'total' => 'required',
            'observaciones' => 'required',
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
        $data = Gasto::find($this->modelId);
        $this->modalFormVisible = true;
        $this->fecha = $data->fecha;
        $this->total = $data->total;
        $this->observaciones = $data->observaciones;
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
            'observaciones' => $this->observaciones,
        ];
    }

    public function create()
    {
        $this->validate();
        Gasto::create($this->modelData());
        $this->reset();
    }

    public function read()
    {
        return Gasto::paginate(5);
    }

    public function update()
    {
        $this->validate();
        Gasto::where('id', $this->modelId)
            ->update($this->modelData());
        $this->reset();
    }

    public function delete()
    {
        Gasto::destroy($this->modelId);
        $this->reset();
    }

    public function render()
    {
        $this->gastosHoy = Gasto::whereDate('fecha', Carbon::now())->sum('total');
        $this->gastosEstaSemana = Gasto::whereBetween('fecha', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $this->gastosEsteMes = Gasto::whereBetween('fecha', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total');
        $this->gastosEsteAno = Gasto::whereBetween('fecha', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('total');
        
        return view('livewire.gastos', [
            'gastos' => Gasto::where('fecha', 'LIKE', "%{$this->search}%")->latest()->paginate(10),
        ]);
    }
}
