<div>
    <div>
        <select wire:model="select">
            <option value="" disabled>Elige un producto...</option>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select>
        <span class="ml-4 mr-2">Precio</span>
        <input type="number" disabled value="{{ $precio }}">
        <span class="ml-4 mr-2">Cantidad</span>
        <input type="number" wire:model="cantidad" min="1"/>
        <button class="ml-4 btn btn-outline-info" wire:click="addProductToProductosSelected">Añadir</button>
    </div>
    <br>
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
            @foreach ($this->productosSelected as $producto)
                <tr>
                    <td>{{ $producto['id'] }}</td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ $producto['precio'] }}</td>
                    <td>{{ $producto['stock'] }}</td>
                    <td>{{ $producto['precio'] * $producto['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <th>Total: </th>
                <th>{{ $total }}</th>
            </tr>
        </tfoot>
    </table>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" wire:click="guardar">Guardar venta</button>
        <button class="btn btn-danger ml-4">Cancelar venta</button>
    </div>
    <button class="cursor-pointer ml-6 text-sm text-red-500" wire:click="confirmedVentaCreate">
        {{ __('Delete') }}
    </button>
</div>

<!-- Delete Token Confirmation Modal -->
<x-jet-dialog-modal wire:model="confirmingVentaCreating">
    <x-slot name="title">
        {{ __('API Token Permissions') }}
    </x-slot>

    <x-slot name="content">
        Soy el content
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingVentaCreating', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="deleteVenta ({{ $confirmingVentaCreating }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>