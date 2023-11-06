<x-app-layout>
    <x-slot name="header">
        <h2 class="px-3 text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        @livewire('dashboard.stats')
        <h2 class="px-8 py-5 text-xl font-semibold leading-tight text-gray-800">
            Ultimas Recolectas - Este Mes
        </h2>

        <div class="px-8">
            @livewire('dashboard.last-iteration', ['month' => date('m'), 'year' => date('Y')])
        </div>
    </div>
</x-app-layout>
