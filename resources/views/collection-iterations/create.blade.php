<x-app-layout>
    <div class="px-8 py-5">
        <div class="flex justify-between w-full space-x-8">
            <div class="flex space-x-8">
                <div>
                    <div class="w-32 p-3 bg-white border-[5px] border-gray-300 rounded-2xl">
                        <img src="{{ asset('misc/svg/undraw_map_re_60yf.svg') }}" alt="" class="rounded-2xl">
                    </div>
                </div>
                <div class="pt-2 text-sm">
                    <p class="text-lg font-medium">Nueva Recolecta</p>
                    <p class="text-2xl font-bold text-gray-800 font-titilium">{{ $collection->place }} -
                        {{ $collection->code }}</p>
                    <p class="font-medium text-gray-600 ">{{ $collection->collectionIterations->count() }}
                        <span>Recolecciones</span>
                    </p>

                </div>
            </div>
            <div class="py-3">
                <div class="bg-white border border-gray-200 rounded-lg shadow ">
                    <div class="grid grid-cols-3 divide-x divide-y">
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Departamento</p>
                            <p class="text-lg font-bold text-gray-800">{{ $collection->municipality->department->name }}
                            </p>
                        </div>
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Municipio</p>
                            <p class="text-lg font-bold text-gray-800">{{ $collection->municipality->name }}</p>
                        </div>
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Lugar</p>
                            <p class="text-lg font-bold text-gray-800">{{ $collection->place }}</p>
                        </div>
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Regional</p>
                            <p class="text-lg font-bold text-gray-800">{{ $collection->regional->name }}</p>
                        </div>
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Cordenadas</p>
                            <p class="text-lg font-bold text-gray-800">
                                N:{{ $collection->locations()->coordinates->latitude }} -
                                E:{{ $collection->locations()->coordinates->longitude }}</p>
                        </div>
                        <div class="col-span-1 p-3">
                            <p class="text-sm font-medium">Altitud</p>
                            <p class="text-lg font-bold text-gray-800">
                                {{ $collection->locations()->altitude }} Metros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            @livewire('collection-iterations.create', ['collection' => $collection])
        </div>
    </div>

</x-app-layout>
