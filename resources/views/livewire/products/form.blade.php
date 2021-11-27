<div class="d-flex">
    <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Stock</td>
                        <td>Estado</td>
                        <td>Foto</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->foto }}</td>
                            <td>
                                <button type="button" class="" wire:click='edit({{ $producto->id }})'>Editar</button>
                                <button type="button" class="" wire:click='destroy({{ $producto->id }})'>Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="col-4 ml-4">
            @include("livewire.$view")
    </div>
</div>
