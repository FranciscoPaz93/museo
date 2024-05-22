<x-app-layout>
    <div class="px-8 ">
        <div class="flex py-3 space-x-8">
            <div class="w-32 p-3 bg-white border-[5px] border-gray-300 rounded-2xl">
                <img src="{{ asset('misc/svg/undraw_treasure_of-9-i.svg') }}" alt="" class="rounded-2xl">
            </div>
            <div class="pt-2 text-sm">

                <h2 class="pt-3 text-sm font-bold text-gray-700/70">Recoleción</h2>
                <h1 class="pb-3 text-lg font-bold">{{ $collectionIteration->collection->code }}</h1>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg ">
            <div class="grid grid-cols-4 divide-x">
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Fecha</p>
                    <p class="text-lg font-bold text-gray-800">{{ $collectionIteration->date }}</p>
                </div>
                <div class="col-span-1 p-5">
                    <p class="text-sm font-medium">Digitalizador</p>
                    <p class="text-lg font-bold text-gray-800">{{ $collectionIteration->digitizer }}</p>
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
