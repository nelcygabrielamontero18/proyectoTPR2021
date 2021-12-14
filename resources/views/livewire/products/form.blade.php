<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" wire:model='nombre'>
    @error('nombre') <span>{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Descripción</label>
    <textarea class="form-control" wire:model='descripcion'></textarea>
    @error('descripcion') <span>{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Cantidad</label>
    <input type="number" class="form-control" wire:model='stock'>
    @error('stock') <span>{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Precio</label>
    <input type="number" class="form-control" wire:model='precio' step=".01">
    @error('precio') <span>{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Foto</label>
    <input type="file" class="form-control" wire:model='foto'>
    @error('foto') <span>{{ $message }}</span> @enderror
</div>