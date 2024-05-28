@props(['bug', 'loop'])
<div x-data="{ show: false }" class="mb-2 border rounded">
    <div class="flex items-center p-2  text-sm  hover:bg-gray-500/20  text-[#375930]">
        <div class="flex items-center w-10 h-full">{{ $loop }}</div>
        <div class="grid flex-1 grid-cols-3 font-normal sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-9">
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Orden
                </div>
                {{ $bug->order }}
            </div>
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
                    Genero
                </div>
                {{ $bug->genus }}
            </div>
            <div class="col-span-1 p-1">
                <div class="block text-xs lg:hidden">
                    Especie
                </div>
                {{ $bug->species }}
            </div>
            <div class="col-span-1 p-1 truncate">
                <div class="block text-xs lg:hidden">
                    Genitalia
                </div>
                {{ $bug->genitalia }}
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
                {{ $bug->size }}
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
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud tubérculo frontal
                    </div>
                    {{ $bug->frontal_tubercle_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Distancia entre tubérculos frontales
                    </div>
                    {{ $bug->distance_between_frontal_tubercles ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud del cepillo epistomal
                    </div>
                    {{ $bug->epistomal_brush_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Ancho del cepillo epistomal
                    </div>
                    {{ $bug->epistomal_brush_width ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 truncate">
                    <div class="block text-xs">
                        Longitud del Ojo
                    </div>
                    {{ $bug->eye_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Ancho del Ojo
                    </div>
                    {{ $bug->eye_width ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Distancia entre los ojos
                    </div>
                    {{ $bug->distance_between_eyes ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud cabeza Pronotum
                    </div>
                    {{ $bug->pronotum_head_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud del Pronotum
                    </div>
                    {{ $bug->pronotum_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud linea media del Metatorax
                    </div>
                    {{ $bug->metatorax_midline_length ?? 'N/D' }}
                </div>
                <div class="col-span-1 p-1 font-semibold">
                    <div class="block text-xs font-normal">
                        Longitud Elitros
                    </div>
                    {{ $bug->eliters_length ?? 'N/D' }}
                </div>
            </div>
        </div>
    </div>
</div>
