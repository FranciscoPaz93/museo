<div>
    <div class="my-5 bg-white border border-gray-200 rounded-lg ">
        <div class="px-5 py-3 border-b">
            <p class="text-lg font-bold">Botes</p>
        </div>
        <ul class="border-collapse">
            @foreach ($jars as $jar)
                <li class="px-5 py-2 border-b">
                    <div class="font-semibold">
                        {{ $jar->code }} <button wire:click="$set('jarSelectedId',{{ $jar->id }})">edit</button>
                    </div>
                    <div>
                        <div class="hidden p-2 text-sm italic lg:flex text-[#375930]">
                            <div class="w-10">#</div>
                            <div
                                class="grid flex-1 grid-cols-3 font-medium sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-9 ">

                                <div class="col-span-1 p-1">
                                    Familia
                                </div>
                                <div class="col-span-1 p-1">
                                    Subfamilia
                                </div>
                                <div class="col-span-1 p-1">
                                    Orden
                                </div>
                                <div class="col-span-1 p-1">
                                    Genero
                                </div>
                                <div class="col-span-1 p-1 truncate">
                                    Genitalia
                                </div>
                                <div class="col-span-1 p-1">
                                    Especie
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
                            <div>
                                <p class="">Acciones</p>
                            </div>
                        </div>
                        @foreach ($jar->bugs as $bug)
                            <x-bug-row :bug="$bug" :loop="$loop->iteration" />
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <x-modal wire:model="showModal" maxWidth="75">
        <div>
            <div class="px-5 py-3 text-xl border-b ">
                Editar Bote
            </div>
            <div class="p-5">
                <div class="flex border">
                    <div class="px-3 py-1 border-r">
                        #
                    </div>
                    <div class="grid w-full grid-cols-12 text-sm font-semibold divide-x ">
                        <div class="col-span-1 p-1">
                            Orden<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-2 p-1">
                            Familia <span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Subfamilia <span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-2 p-1">
                            Genero<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Especie<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-2 p-1 truncate">
                            Genitalia<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Sexo<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Color<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Tamaño<span class="text-red-500">*</span>
                        </div>

                    </div>
                </div>
                @if ($jarSelectedId)
                    @forelse ($jarSelected->bugs as $lbug)
                        <div class="flex border">
                            <div class="px-3 py-1 border-r">
                                {{ $loop->iteration }}
                            </div>
                            <div class="grid w-full grid-cols-12 text-sm font-semibold ">
                                <div class="col-span-1 p-1">
                                    {{ $lbug->order }}
                                </div>
                                <div class="col-span-2 p-1">
                                    {{ $lbug->family }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $lbug->subfamily }}
                                </div>
                                <div class="col-span-2 p-1">
                                    {{ $lbug->genus }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $lbug->species }}
                                </div>
                                <div class="col-span-2 p-1 truncate">
                                    {{ $lbug->genitalia }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $lbug->gender }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $lbug->color }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $lbug->size }}
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                @endif
            </div>

        </div>

    </x-modal>
</div>
