<div>
    <div class="mb-5 bg-white border border-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between p-3 border-b">
            <div class="flex items-center justify-between space-x-2">
                <div class="flex items-center">

                    <p class="flex items-center justify-center px-2 border border-gray-500 rounded-full"><span
                            class="text-lg font-bold font-titilium">1</span></p>
                    <p class="font-semibold">Información</p>
                </div>
            </div>
            <div class="flex space-x-5">


                @if ($collectionIterationId)
                    @if ($collectionIteration->status == '0')
                        <p class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-full">Borrador</p>
                    @endif
                    <p class="px-3 py-1 text-xs font-medium text-white bg-green-500 rounded-full">Guardado</p>
                @endif
            </div>
        </div>
        <div class="p-3">
            <div class="flex ">
                <div class="p-2">
                    <label for="">
                        <p>Fecha Colecta</p>
                        @if (isset($collectionIteration))
                            @if ($collectionIteration->status == 0)
                                <input type="date"
                                    class="w-full p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                    wire:model="date_iteration">
                            @else
                                <p
                                    class="p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0">
                                    {{ \Carbon\Carbon::parse($collectionIteration->date)->format('d M, Y') }}
                            @endif
                        @else
                            <input type="date"
                                class="w-full p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="date_iteration">
                        @endif
                    </label>
                </div>
                <div class="p-2">
                    <label for="">
                        <p>Periodo</p>
                        @if (isset($collectionIteration))
                            @if ($collectionIteration->status == 0)
                                <select name="" id=""
                                    class="w-64 p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                    wire:model="period">
                                    <option value="">Selecionar</option>
                                    <option value="1">1ER Mensual</option>
                                    <option value="2">2DA Mensual</option>
                                </select>
                            @else
                                <p
                                    class="p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0">
                                    {{ $collectionIteration->period == 1 ? 'Primera colecta mensual' : 'Segunda colecta mensual' }}
                            @endif
                        @else
                            <select name="" id=""
                                class="w-64 p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="period">
                                <option value="">Selecionar</option>
                                <option value="1">1ER Mensual</option>
                                <option value="2">2DA Mensual</option>
                            </select>
                        @endif
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow" x-data={addJar:false}>
        <div class="flex items-center justify-between p-3 border-b">
            <div class="flex items-center space-x-2">
                <p class="flex items-center justify-center px-2 border border-gray-500 rounded-full"><span
                        class="text-lg font-bold font-titilium">2</span></p>
                <p class="font-semibold">Frascos</p>
            </div>
            @if (!$collectionIterationId)
                <button @click="addJar=!addJar"
                    :class="addJar ? 'bg-red-500 hover:bg-red-600 text-white' : 'bg-white hover:bg-gray-100'"
                    class="flex items-center px-5 py-1 font-semibold text-gray-800 border rounded-lg active:shadow-inner"
                    wire:click="$toggle('addJar')" wire:loading.attr='disabled'>
                    {{ $addJar ? 'Cancelar' : ' Añadir frasco ' }}
                    <span wire:loading>
                        <i class='bx bx-loader-circle bx-spin bx-rotate-90'></i>
                    </span>
                </button>
            @endif
        </div>

        <div class="p-3">
            <div class="flex ">
                <div class="flex h-full p-1 border rounded-tl-lg">
                    <div
                        class="flex items-center justify-center p-4 text-sm text-right text-white border-r-0 border-gray-200 rounded-full">

                    </div>
                </div>
                <div class="grid flex-1 grid-cols-4 text-sm font-medium text-gray-500 border rounded-tr-lg">
                    <div class="p-2">Frasco
                        @error('jarCode')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="p-2">Fecha</div>
                    <div class="p-2">Recolector</div>
                    <div class="p-2">Cantidad
                        @error('quantity')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            @if ($addJar)
                <div class="grid grid-cols-4 border-b divide-x border-x">
                    <div class="p-2">
                        <label for="">
                            <input type="text"
                                class="w-full p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="jarCode" disabled>
                        </label>
                    </div>
                    <div class="p-2">
                        <label for="">
                            <input type="date"
                                class="w-full p-1 text-right bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model='recolectionDate' disabled>
                        </label>
                    </div>
                    <div class="p-2">
                        <label for="">
                            <input type="text"
                                class="w-full p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="collector" disabled>
                        </label>
                    </div>
                    <div class="flex p-2 space-x-3">
                        <label for="w-full">
                            <input type="number"
                                class="w-full p-1 bg-gray-200 border-0 rounded-sm focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="quantity">
                        </label>
                        <button
                            class="flex items-center justify-center px-2 text-sm text-right border border-gray-200 rounded"
                            wire:click="addJars()">
                            Agregar
                        </button>
                    </div>
                </div>
            @endif
            @if (!$collectionIterationId)
                @forelse ($jars as $jar)
                    <div class="flex ">
                        <div class="flex h-full p-1 border">
                            @if ($loop->last)
                                <button
                                    class="flex items-center justify-center text-sm text-right text-white bg-red-500 border border-r-0 border-gray-200 rounded-full"
                                    wire:click="removeJar('{{ $jar['code'] }}')" wire:key>
                                    <i class='p-2 bx bx-trash'></i>
                                </button>
                            @else
                                <button
                                    class="flex items-center justify-center p-4 text-sm text-right text-white border-r-0 border-gray-200 rounded-full">

                                </button>
                            @endif

                        </div>
                        <div class="grid flex-1 grid-cols-4 border-b border-x">
                            <div class="p-2 ">{{ $jar['code'] }}</div>
                            <div class="p-2 border-l">
                                {{ \Carbon\Carbon::parse($jar['recolection_date'])->format('d M, Y') }}
                            </div>
                            <div class="p-2 border-l">{{ $jar['collector'] }}</div>
                            <div class="p-2 border-l">{{ $jar['quantity'] }}</div>
                        </div>
                    </div>
                @empty
                    <div
                        class="flex justify-center p-3 text-sm font-medium text-center text-gray-500 border-b border-x">
                        <p class="flex items-center px-5 py-1 bg-gray-200 rounded-full">
                            <span><i class='bx bx-info-circle'></i></span>
                            <span>¡No hay frascos aun!</span>
                        </p>
                    </div>
                @endforelse
            @else
                @foreach ($jarStored as $jar)
                    <div class="flex text-sm">
                        <div class="flex h-full p-1 border">
                            <div
                                class="flex items-center justify-center p-4 text-sm text-right text-white border-r-0 border-gray-200 rounded-full">
                            </div>
                        </div>
                        <div class="grid flex-1 grid-cols-4 border-b border-x">
                            <div class="p-2 ">{{ $jar->code }}</div>
                            <div class="p-2 border-l">
                                {{ \Carbon\Carbon::parse($jar->collection?->date)->format('d M, Y') }}
                            </div>
                            <div class="p-2 border-l">{{ $jar->collection_iteration->collector }}</div>
                            <div class="p-2 border-l">{{ $jar->quantity }}</div>
                        </div>
                    </div>
                @endforeach

            @endif
            @if ($jars)
                <div class="flex justify-start p-3">
                    <button
                        class="flex items-center justify-center px-5 py-2 rounded  font-semibold text-white bg-[#375930]  hover:bg-emerald-900"
                        wire:loading.attr='disabled' wire:click="saveJars()">
                        Guardar Frascos
                    </button>
                </div>
            @endif
        </div>

    </div>
    <div class="mt-5 bg-white border border-gray-200 rounded-lg shadow" x-data='{tab:1}'>
        <div class="flex items-center justify-between p-3 border-b">
            <div class="flex items-center space-x-2">
                <p class="flex items-center justify-center px-2 border border-gray-500 rounded-full"><span
                        class="text-lg font-bold font-titilium">2</span></p>
                <p class="font-semibold">Insectos</p>
            </div>
            <div class="flex items-center justify-end">
                (<span class="text-red-500">*</span>) Requerido
            </div>
        </div>
        @if ($jarStored)
            <div class="flex">
                <div class="w-1/6 border-r">
                    @foreach ($jarStored as $jar)
                        <div class="px-5 py-2 border-b cursor-pointer "
                            :class="tab == {{ $loop->iteration }} ? 'bg-gray-500/20 border-l-4  border-b-0 border-teal-500' :
                                'hover:bg-green-200'"
                            wire:click="$set('jarSelected','{{ $jar->id }}')"
                            @click="tab={{ $loop->iteration }}">
                            <p>{{ $jar->code }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="w-5/6 min-h-[40vh]">
                    <div class="flex border-b">
                        <div class="px-3 py-1 border-r">
                            #
                        </div>
                        <div class="grid w-full grid-cols-12 text-sm font-semibold divide-x ">
                            <div class="col-span-2 p-1">
                                Familia <span class="text-red-500">*</span>
                            </div>
                            <div class="col-span-1 p-1">
                                Subfamilia <span class="text-red-500">*</span>
                            </div>
                            <div class="col-span-1 p-1">
                                Orden<span class="text-red-500">*</span>
                            </div>
                            <div class="col-span-1 p-1">
                                Especie
                            </div>
                            <div class="col-span-2 p-1">
                                Genero
                            </div>
                            <div class="col-span-2 p-1 truncate">
                                Genitalia
                            </div>
                            <div class="col-span-1 p-1">
                                Sexo
                            </div>
                            <div class="col-span-1 p-1">
                                Color
                            </div>
                            <div class="col-span-1 p-1">
                                Tamaño
                            </div>

                        </div>
                    </div>
                    <div>
                        @foreach ($jarStored as $jar)
                            @foreach ($jar->bugs as $bug)
                                <div class="flex border-b" x-show="tab=={{ $loop->parent->iteration }}">
                                    <div class="px-3 py-1 border-r">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="grid w-full grid-cols-12 text-sm font-semibold ">
                                        <div class="col-span-2 p-1">
                                            {{ $bug->family }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->subfamily }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->order }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->species }}
                                        </div>
                                        <div class="col-span-2 p-1">
                                            {{ $bug->genus }}
                                        </div>
                                        <div class="col-span-2 p-1 truncate">
                                            {{ $bug->genitalia }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->gender }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->color }}
                                        </div>
                                        <div class="col-span-1 p-1">
                                            {{ $bug->size }}
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    @if ($collectionIteration->status == 0)

                        @if ($jarSelected)
                            <div class="border-b" x-data="{ sizes: false }">

                                <div class="flex">
                                    <div class="px-3 py-1 ">
                                        +
                                    </div>
                                    <div class="grid w-full grid-cols-12 text-sm font-semibold ">
                                        <div class="col-span-2 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.family">

                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.subfamily">
                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.order">
                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.species">
                                            </label>
                                        </div>
                                        <div class="col-span-2 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.genus">
                                            </label>
                                        </div>
                                        <div class="col-span-2 p-1 truncate">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.genitalia">
                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.gender">
                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.color">
                                            </label>
                                        </div>
                                        <div class="col-span-1 p-1">
                                            <label for="">
                                                <input type="text"
                                                    class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                    wire:model="bug.size">
                                            </label>
                                        </div>

                                    </div>

                                </div>
                                <div class="px-8 py-2">
                                    @if ($errors->any())
                                        <div class="bg-red-100 border border-red-500 rounded">
                                            <p class="px-3 py-1 text-sm font-medium text-red-500">
                                                {{ $errors->first() }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="grid grid-cols-4 px-8 my-5 xl:grid-cols-6 gap-x-3 gap-y-5" x-show="sizes">
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Longitud tuberculo frontal</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.frontal_tubercle_length" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Distancia entre tuberculo frontal</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.distance_between_frontal_tubercle" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Longitud del cepillo epistomal</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.epistome_brush_length" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Ancho proceso epistomal</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.epistome_process_wide" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium ">Longitud del ojo</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.eye_length" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Ancho del ojo</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.eye_wide" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">Distancia entre ojos</p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bug.distance_between_eyes" />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">
                                                Longitud cabeza pronotum
                                            </p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model='bug.pronotum_head_length' />

                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">
                                                Longitud pronotum
                                            </p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model='bug.pronotum_length' />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">
                                                Longitud linea media metatorax
                                            </p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model='bug.metatorax_midline_length' />

                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">
                                                Longitud Abdominal
                                            </p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model='bug.abdominal_length' />
                                        </label>
                                    </div>
                                    <div class="p-2 border rounded-lg">
                                        <label for="">
                                            <p class="mb-2 text-sm font-medium">
                                                Longitud Elitros
                                            </p>
                                            <input type="number"
                                                class="w-32 p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model='bug.eliters_length' />
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-start px-8 mb-3 space-x-3">
                                        <button
                                            class="flex items-center justify-center px-5 py-2 rounded  font-semibold text-white bg-[#375930]  hover:bg-emerald-900"
                                            wire:loading.attr='disabled' wire:click="saveBugs()">
                                            Guardar Insectos
                                        </button>
                                        <label for="">
                                            <input type="checkbox" x-model="sizes" id=""
                                                class="text-[#375930] rounded outline-none focus:ring-0">
                                            <span class="ml-1 text-[#375930] font-medium">Agregar medidas</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @else
            <div class="content-center text-center">
                <div class="flex justify-center p-3 text-sm font-medium text-center text-gray-500 ">
                    <p class="flex items-center px-5 py-1 bg-gray-200 rounded-full">
                        <span><i class='bx bx-info-circle'></i></span>
                        <span>Debes guardar los frascos</span>
                    </p>
                </div>
            </div>
        @endif
        <div class="flex items-center justify-end p-3 space-x-3 border-t">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-500 rounded">
                    <p class="px-3 py-1 text-sm font-medium text-red-500">{{ $errors->first() }}
                    </p>
                </div>
            @endif
            @if ($jarStored)

                @if ($collectionIteration->status == '0')
                    <button wire:click='checkForComplete'
                        class="px-5 py-1.5 border-4 rounded-md border-[#375930] text-[#375930] font-semibold hover:bg-[#375930] hover:text-white transition-all duration-150">
                        Finalizar
                    </button>
                @endif


            @endif
        </div>
    </div>

</div>
