<div>
    <div class="pt-5">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 "
                placeholder="" required wire:model='search'>

        </div>
    </div>
    <div class="grid grid-cols-9 px-5 py-5 text-xs font-black uppercase gap-x-2">
        <div class="col-span-1">
            <div class="flex space-x-2">
                <div class="">#</div>
                <div class="w-full text-left">
                    <p wire:click="sortBy('code')" class="flex items-center cursor-pointer">
                        CODIGO
                        @if ($sortField == 'code')
                            <i class='bx bxs-{{ $sortAsc ? 'up' : 'down' }}-arrow'></i>
                        @else
                            <span class="flex flex-col text-xs">
                                <i class='bx bxs-sort-alt'></i>
                            </span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <p wire:click="sortBy('department')" class="flex items-center cursor-pointer">Departamento
                @if ($sortField == 'department')
                    <i class='bx bxs-{{ $sortAsc ? 'up' : 'down' }}-arrow'></i>
                @else
                    <span class="flex flex-col text-xs">
                        <i class='bx bxs-sort-alt'></i>
                    </span>
                @endif

            </p>
        </div>
        <p wire:click="sortBy('municipality')" class="flex items-center cursor-pointer">Municipio
            @if ($sortField == 'municipality')
                <i class='bx bxs-{{ $sortAsc ? 'up' : 'down' }}-arrow'></i>
            @else
                <span class="flex flex-col text-xs">
                    <i class='bx bxs-sort-alt'></i>
                </span>
            @endif

        </p>
        <div class="col-span-1">
            <p>Lugar</p>
        </div>
        <div class="col-span-2">
            <p>Regional</p>
        </div>
        <div class="col-span-1">
            <p>Cordenadas</p>
        </div>
        <div class="col-span-1">
            <p>Altitud</p>
        </div>
        <div class="col-span-1">
            <p>Acciones</p>
        </div>
    </div>
    <div>
        @forelse ($collections as $collection)
            <a href="{{ route('collections.show', $collection) }}"
                class="grid grid-cols-9 px-5 py-3 text-sm font-semibold text-gray-600 transition-colors duration-50 gap-x-2 odd:bg-green-50 hover:text-white hover:bg-green-500/80">
                <div class="col-span-1">
                    <div class="flex space-x-2">
                        <div class="">{{ $loop->iteration }}</div>
                        <div class="w-full text-left">{{ $collection->code }}</div>
                    </div>
                </div>
                <div class="col-span-1">
                    <p>{{ $collection->municipality->department->name }}</p>
                </div>
                <div class="col-span-1">
                    <p>{{ $collection->municipality->name }}</p>
                </div>
                <div class="col-span-1">
                    <p>{{ $collection->place }}</p>
                </div>

                <div class="col-span-2">
                    <p>{{ $collection->regional->name }}</p>
                </div>
                <div class="col-span-1">
                    <p>N:{{ $collection->location->latitude }},E:{{ $collection->location->longitude }}</p>
                </div>
                <div class="col-span-1">
                    <p>{{ $collection->altitude }}</p>
                </div>
                <div class="col-span-1">
                    <p><span></span></p>
                </div>
            </a>
        @empty
        @endforelse
    </div>
</div>
