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
                        <div class="grid grid-cols-12 font-bold border divide-x bg-green-200/60">
                            <div class="p-1">
                                #
                            </div>
                            <div class="col-span-1 p-1">
                                Familia
                            </div>
                            <div class="col-span-1 p-1">
                                Subfamilia
                            </div>
                            <div class="col-span-2 p-1">
                                Orden
                            </div>
                            <div class="col-span-1 p-1">
                                Genero
                            </div>
                            <div class="col-span-1 p-1 truncate">
                                Resultado Genitalia
                            </div>
                            <div class="col-span-1 p-1 truncate">
                                Resultado Final
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
                        @foreach ($jar->bugs as $bug)
                            <div class="grid grid-cols-12 border divide-x">
                                <div class="p-1">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $bug->family }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $bug->subfamily }}
                                </div>
                                <div class="col-span-2 p-1">
                                    {{ $bug->order }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $bug->genus }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $bug->genitalia_results }}
                                </div>
                                <div class="col-span-1 p-1">
                                    {{ $bug->final_result }}
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
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
