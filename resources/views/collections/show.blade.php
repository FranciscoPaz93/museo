<x-app-layout>
    <div class="px-8 py-3 text-[#375930]">
        <div class="flex space-x-8">
            <div class="w-32 p-3 bg-white border-[5px] border-gray-300 rounded-2xl">
                <img src="{{ asset('misc/svg/undraw_map_dark_re_36sy.svg') }}" alt="" class="rounded-2xl">
            </div>
            <div class="pt-2 text-sm">
                <p class="text-lg font-medium">Colecta</p>
                <p class="text-2xl font-bold text-gray-800 font-titilium">{{ $collection->place }} -
                    {{ $collection->code }}</p>
                <p class="font-medium text-gray-600 ">{{ $collection->collectionIterations->count() }}
                    <span>Recolecciones</span>
                </p>
            </div>
        </div>
        <div class="py-3">
            <div class="bg-white border border-gray-200 rounded-lg ">
                <div class="grid grid-cols-3 divide-x divide-y">
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Departamento</p>
                        <p class="text-lg font-bold text-[#375930]">{{ $collection->municipality->department->name }}
                        </p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Municipio</p>
                        <p class="text-lg font-bold text-[#375930]">{{ $collection->municipality->name }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Lugar</p>
                        <p class="text-lg font-bold text-[#375930]">{{ $collection->place }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Regional</p>
                        <p class="text-lg font-bold text-[#375930]">{{ $collection->regional->name }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Cordenadas</p>
                        <p class="text-lg font-bold text-[#375930]">N:{{ $collection->location->latitude }} -
                            E:{{ $collection->location->longitude }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Altitud</p>
                        <p class="text-lg font-bold text-[#375930]">{{ $collection->altitude }} Metros</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3">
            <div class="bg-white border border-gray-200 rounded ">
                <div class="flex justify-between px-5 py-3 border-b">
                    <p class="text-lg font-bold">Historial de Colecta</p>
                    <a href="{{ route('collection-iterations.create', ['collection_id' => $collection->id]) }}"
                        class="px-5 py-1 font-semibold text-gray-800 border-2 rounded-lg">Crear</a>
                </div>
                @livewire('collections.table-collection-iteration', ['collection' => $collection])
            </div>
        </div>
    </div>

</x-app-layout>
