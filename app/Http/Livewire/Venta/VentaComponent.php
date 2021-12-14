<?php

namespace App\Http\Livewire\Venta;

use App\Models\Venta;
use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;

class VentaComponent extends Component
{
    public $precio = 0, $cantidad = 0, $select = '', $total = 0;
    public $productosSelected = [];
    public $productos;
    public Producto $producto;
    public $confirmingVentaCreating = false;

    public function updatedselect($id) {
        $this->producto = $this->getOneProduct($id);
        $this->cantidad = 1;
        $this->precio = $this->producto->precio;
    }

    public function getOneProduct($id)
    {
        return Producto::find($id);
    }

    public function addProductToProductosSelected()
    {
        $this->producto->stock = $this->cantidad;
        $this->producto->precio = $this->precio;
        $this->total = $this->total + ($this->producto->stock * $this->producto->precio);
        array_push($this->productosSelected, $this->producto);
    }

    public function guardar()
    {
        $venta = new Venta;
        $venta->user_id = Auth::id();
        $venta->total = $this->total;
        $venta->fecha = Date::now();
        $venta->save();
        $ventaProductos = [];
        foreach ($this->productosSelected as $produc)
        {
            $ventaProductos = $ventaProductos + [
                $produc['id'] => [
                    'cantidad' => $produc['stock'],
                    'precio' => $produc['precio'],
                ],
            ];
        }
        $venta->productos()->attach($ventaProductos);
        return view('livewire.venta.list-component');
    }

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.venta.venta-component');
    }

    public function confirmedVentaCreate() {
        $this->confirmingVentaCreating = true;
    }

    public function deleteVenta($id) {
        $this->confirmingVentaCreating = false;
    }
}
