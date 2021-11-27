<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;

class ProductComponent extends Component
{

    use WithFileUploads;
    public $productos = [];

    public $view = 'products/create';

    public $product_id, $nombre, $descripcion, $stock, $precio, $estado, $foto;

    public function destroy($id){
        Producto::destroy($id);
    }

    public function save(){
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'foto' => 'image',
        ]);

        Producto::create([
            'nombre'        => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock'    => $this->stock,
            'precio'       => $this->precio,
            'foto' => $this->foto->store('public')
        ]);
        $this->reset();
    }

    public function edit($id){
        $product = Producto::find($id);

        $this->product_id = $product->id;
        $this->nombre = $product->nombre;
        $this->descripcion = $product->descripcion;
        $this->stock = $product->stock;
        $this->precio = $product->precio;
        $this->estado = $product->estado;
        $this->foto = $product->foto;

        $this->view = 'products/edit';
    }

    public function update(){
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'foto' => 'required',
        ]);
        $product = Producto::find($this->product_id);
        $product->update([
            'nombre'        => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock'    => $this->stock,
            'precio'       => $this->precio,
            'foto'       => $this->foto,
        ]);

        $this->reset();
    }

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.products.product-component');
    }
}
