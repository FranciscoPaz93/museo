<div>
    <div class="my-5 bg-white border border-gray-200 rounded-lg ">
        <div class="px-5 py-3 border-b">
            <p class="text-lg font-bold">Botes</p>
        </div>
        <ul class="border-collapse">
            @foreach ($jars as $jar)
                <li class="px-5 py-2 border-b">
                    <div class="font-semibold">
                        {{ $jar->code }}
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
                                <p class=""> Acciones</p>
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
</div>
