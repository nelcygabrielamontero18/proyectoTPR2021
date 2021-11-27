<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Productos') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div>
          <div class="container">
              <livewire:product-component />
          </div>
      </div>
  </div>
</x-app-layout>
