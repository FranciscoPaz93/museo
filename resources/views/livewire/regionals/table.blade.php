<div>
    <div class="relative mx-3 mt-5">
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
    <div class="grid grid-cols-6 px-5 py-5 text-xs font-black uppercase gap-x-2">
        <div class="col-span-1">
            <div class="flex space-x-2">
                <div class="">#</div>
                <div class="w-full text-left">
                    <p wire:click="" class="flex items-center cursor-pointer">
                        CODIGO
                    </p>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <p>Nombre</p>
        </div>
        <div class="col-span-1">
            <p>Departmentos</p>
        </div>
        <div class="col-span-1">
            <p>Colectas</p>
        </div>
        <div class="col-span-1">
            <p class="">Acciones</p>
        </div>
    </div>
    <div>

        @forelse ($regionals as $regional)
            <div
                class="grid grid-cols-6 px-5 py-3 text-sm font-semibold text-gray-600 transition-colors duration-50 gap-x-2 odd:bg-green-50 hover:text-white hover:bg-green-500/80">
                <div class="col-span-1">
                    <div class="flex space-x-2">
                        <div class="">{{ $regional->id }}</div>
                        <div class="w-full text-left">
                            <p wire:click="" class="flex items-center ">
                                {{ $regional->identity }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <p>{{ $regional->name }}</p>
                </div>
                <div class="col-span-1">
                    <p>Departmentos</p>
                </div>
                <div class="col-span-1">
                    {{ $regional->collections->count() }} Puntos
                </div>
                <div class="col-span-1">
                    <p class=""><a href="" class="underline">Editar</a></p>
                </div>
            </div>
        @empty
            <div
                class="px-5 py-3 text-sm font-semibold text-gray-600 transition-colors duration-50 gap-x-2 odd:bg-green-50 hover:text-white hover:bg-green-500/80">
                No hay resultados "
            </div>
        @endforelse
    </div>
    <div class="p-3">
        {{ $regionals->links() }}
    </div>

</div>
