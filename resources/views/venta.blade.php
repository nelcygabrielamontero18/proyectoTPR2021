<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Ventas') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div>
          <div class="container">
            <livewire:venta.venta-component />
          </div>
      </div>
  </div>
</x-app-layout>
