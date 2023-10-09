<x-app-layout>
    <div class="px-8">
        <div class="pt-5 text-sm">
            <p class="font-medium">Regional</p>
            <p class="text-lg font-bold text-gray-800">{{ $regional->name }}</p>
        </div>
        <div class="py-3">
            <div class="bg-white border border-gray-200 rounded-lg ">
                <div class="grid grid-cols-3 divide-x divide-y">
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Departamentos</p>
                        <p class="text-lg font-bold text-gray-800">{{ $regional->departaments }}</p>
                    </div>
                    <div class="col-span-1 p-5">
                        <p class="text-sm font-medium">Codigo</p>
                        <p class="text-lg font-bold text-gray-800">{{ $regional->identity }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border rounded ">
            <div class="flex items-center justify-between p-3 border-b">
                <p class="text-lg font-bold ">Colectas</p>
                <div>
                    <a href="" class="px-5 py-2 font-bold text-white bg-green-500 rounded">Crear</a>
                </div>
            </div>
            <div class="grid grid-cols-9 px-5 py-5 text-sm font-semibold border-b gap-x-2">
                <div class="col-span-1">
                    <div class="flex space-x-2">
                        <div class="">#</div>
                        <div class="w-full text-left">
                            <p class="flex items-center cursor-pointer">
                                Codigo
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <p class="flex items-center cursor-pointer">
                        Departamento
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="flex items-center cursor-pointer">
                        Municipio
                    </p>
                </div>
                <div class="col-span-1">
                    <p>Lugar</p>
                </div>

                <div class="col-span-1">
                    <p>Cordenadas</p>
                </div>
                <div class="col-span-1 px-3">
                    <p>Altitud</p>
                </div>
                <div class="col-span-1">
                    <p>Acciones</p>
                </div>
            </div>
            @foreach ($regional->collections as $collection)
                <a href="{{ route('collections.show', $collection) }}"
                    class="grid grid-cols-9 px-5 py-3 text-sm font-medium text-gray-600 transition-colors duration-50 gap-x-2 odd:bg-gray-50 hover:text-gray-800 hover:bg-gray-500/20">
                    <div class="col-span-1">
                        <div class="flex space-x-2">
                            <div class="font-bold">{{ $loop->iteration }}</div>
                            <div class="w-full text-left">{{ $collection->code }}</div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <p>{{ $collection->municipality->department->name }}</p>
                    </div>
                    <div class="col-span-2">
                        <p>{{ $collection->municipality->name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p>{{ $collection->place }}</p>
                    </div>
                    <div class="col-span-1">
                        <p>N:{{ $collection->location->latitude }},E:{{ $collection->location->longitude }}</p>
                    </div>
                    <div class="col-span-1 px-3">
                        <p>{{ $collection->altitude }}</p>
                    </div>
                    <div class="col-span-1">
                        <p><span></span></p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
