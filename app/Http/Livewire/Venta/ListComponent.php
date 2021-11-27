<?php

namespace App\Http\Livewire\Venta;

use Livewire\Component;
use App\Models\Venta;

class ListComponent extends Component
{

    public $ventas = [];


    public function getAllVentas()
    {
        $this->ventas = Venta::all();
    }

    public function render()
    {
        $this->getAllVentas();
        return view('livewire.venta.list-component');
    }
}
