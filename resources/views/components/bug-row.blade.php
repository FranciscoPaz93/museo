@props(['bug', 'loop'])
<div x-data="{ show: false }" class="mb-2 border rounded">
    <div class="flex items-center p-2  text-sm  hover:bg-gray-500/20  text-[#375930]">
        <div class="flex items-center w-10 h-full">{{ $loop }}</div>
        <div class="grid flex-1 grid-cols-3 font-normal sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-9">
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Familia
                </div>
                {{ $bug->family }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Subfamilia
                </div>
                {{ $bug->subfamily }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Orden
                </div>
                {{ $bug->order }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Genero
                </div>
                {{ $bug->genus }}
            </div>
            <div class="col-span-1 p-1 truncate">
                <div class="block text-xs lg:hidden">
                    Genitalia
                </div>
                {{ $bug->genitalia }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Especie
                </div>
                {{ $bug->species }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Sexo
                </div>
                {{ $bug->gender }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Color
                </div>
                {{ $bug->color }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Tamaño
                </div>
                {{ $bug->size }} {{ $bug->size != 'n/a' ? 'mm' : '' }}
            </div>
        </div>
        <div>
            <p class="text-xs underline cursor-pointer" @click='show=!show'>Detalles</p>
        </div>
    </div>
    <div x-show="show">
        <div class="p-8 text-sm bg-gray-100">
            <div
                class="grid flex-1 grid-cols-3 font-normal sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-9">
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Familia
                    </div>
                    {{ $bug->family }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Subfamilia
                    </div>
                    {{ $bug->subfamily }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Orden
                    </div>
                    {{ $bug->order }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Genero
                    </div>
                    {{ $bug->genus }}
                </div>
                <div class="col-span-1 p-1 truncate">
                    <div class="block text-xs">
                        Genitalia
                    </div>
                    {{ $bug->genitalia }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Especie
                    </div>
                    {{ $bug->species }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Sexo
                    </div>
                    {{ $bug->gender }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Color
                    </div>
                    {{ $bug->color }}
                </div>
                <div class="col-span-1 p-1">
                    <div class="block text-xs">
                        Tamaño
                    </div>
                    {{ $bug->size }} {{ $bug->size != 'n/a' ? 'mm' : '' }}
                </div>
            </div>
        </div>
    </div>
</div>
