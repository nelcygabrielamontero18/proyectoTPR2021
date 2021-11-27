<div>
    @foreach ($this->ventas as $venta)
    <div class="card p-3 border-shadow border-rounded mt-3">
        <h3>Venta #{{ $venta->id }}</h3>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h5>Usuario: {{ $venta->user->name }}</h5>
            <span>Fecha: {{ $venta->fecha }}</span>
            <h5>Email: {{ $venta->user->email }}</h5>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->productos as $producto )
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->pivot->precio }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>{{ $producto->pivot->precio * $producto->pivot->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1"></td>
                    <td></td>
                    <td></td>
                    <th>Total: </th>
                    <th>{{ $venta->total }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endforeach
</div>
