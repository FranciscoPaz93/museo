<x-app-layout>
    <div class="px-8 ">
        <h2 class="pt-3 text-sm font-bold text-gray-700/70">Recoleción</h2>
        <h1 class="pb-3 text-lg font-bold">{{ $collectionIteration->collection->code }}</h1>
        <div class="bg-white border border-gray-200 rounded-lg ">
            <div class="grid grid-cols-4 divide-x">
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Fecha</p>
                    <p class="text-lg font-bold text-gray-800">{{ $collectionIteration->date }}</p>
                </div>
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Colector</p>
                    <p class="text-lg font-bold text-gray-800">{{ $collectionIteration->collector }}</p>
                </div>
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Identificador</p>
                    <p class="text-lg font-bold text-gray-800">{{ $collectionIteration->identifier }}</p>
                </div>
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Etapa</p>
                    <p class="text-lg font-bold text-gray-800">
                        {{ $collectionIteration->period == 1 ? 'Primera Colecta Mensual' : 'Segunda Colecta Mensual' }}
                    </p>
                </div>
            </div>
        </div>
        @livewire('jar.table', ['collectionIteration' => $collectionIteration])
    </div>
</x-app-layout>
