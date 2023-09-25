<x-app-layout>
    <div class="px-8">
        <div class="pt-5 text-sm">
            <p class="font-medium">Colecta</p>
            <p class="text-lg font-bold text-gray-800">{{ $collection->place }} - {{ $collection->code }}</p>
        </div>
        <div class="py-3">
            <div class="bg-white border border-gray-200 rounded-lg ">
                <div class="grid grid-cols-3 divide-x divide-y">
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Departamento</p>
                        <p class="text-lg font-bold text-gray-800">{{ $collection->municipality->department->name }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Municipio</p>
                        <p class="text-lg font-bold text-gray-800">{{ $collection->municipality->name }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Lugar</p>
                        <p class="text-lg font-bold text-gray-800">{{ $collection->place }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Regional</p>
                        <p class="text-lg font-bold text-gray-800">{{ $collection->regional->name }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Cordenadas</p>
                        <p class="text-lg font-bold text-gray-800">N:{{ $collection->location->latitude }} -
                            E:{{ $collection->location->longitude }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Altitud</p>
                        <p class="text-lg font-bold text-gray-800">{{ $collection->altitude }} Metros</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3">
            <div class="bg-white border border-gray-200 rounded ">
                <div class="px-5 py-3 border-b">
                    <p class="text-lg font-bold">Historial de Colecta</p>
                </div>
                @livewire('collections.table-collection-iteration', ['collection' => $collection])
            </div>
        </div>
    </div>

</x-app-layout>
