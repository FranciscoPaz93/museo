<div>
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

        @foreach ($regionals as $regional)
            <div
                class="grid grid-cols-6 px-5 py-3 text-sm font-semibold text-gray-600 transition-colors duration-50 gap-x-2 odd:bg-green-50 hover:text-white hover:bg-green-500/80">
                <div class="col-span-1">
                    <div class="flex space-x-2">
                        <div class="">#</div>
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
        @endforeach
    </div>

</div>
