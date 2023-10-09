<div>
    <div class="px-3 border-b text-[#375930]">

        <ul class="flex cursor-pointer" x-data={year:null}>
            <li class="px-3 py-2 font-bold"><span>Selecciona:</span></li>

            <li class="px-5 py-2 font-medium" :class="{ 'border-b-2 border-green-500': year === null }"
                wire:click='setYear(null)' @click="year=null"><span>Todo</span></li>
            @foreach ($filterYear as $item)
                <li class="px-5 py-2 font-medium" @click="year={{ $item }}"
                    wire:click='setYear({{ $item }})'
                    :class="{ 'border-b-2 border-green-500': year === {{ $item }} }">
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="grid grid-cols-5 px-8 py-2 text-sm font-semibold text-[#375930]] ">
        <div class="col-span-1">
            <p>Fecha</p>
        </div>
        <div class="col-span-1">
            <p>Colector</p>
        </div>
        <div class="col-span-1">
            <p>Identificador</p>
        </div>
        <div class="col-span-1">
            <p>Etapa</p>
        </div>
        <div class="col-span-1">
            <p>Acciones</p>
        </div>
    </div>
    <div>
        @forelse ($collectionIterations as $collectionIteration)
            <a href="{{ route('collection-iterations.show', $collectionIteration) }}"
                class="grid grid-cols-5 px-8 py-3 text-sm font-medium text-[#32412d] transition-colors hover:border-l-4 hover:border-green-600 duration-50 gap-x-2 odd:bg-gray-50 hover:text-green-950 hover:bg-gray-500/20">
                <div class="col-span-1">
                    <p>{{ $collectionIteration->date }}</p>
                </div>
                <div class="col-span-1">
                    <p>{{ $collectionIteration->collector }}</p>

                </div>
                <div class="col-span-1">
                    <p>{{ $collectionIteration->identifier }}</p>
                </div>
                <div class="col-span-1">
                    <p>Etapa</p>
                </div>
                <div class="col-span-1">
                    <p>Acciones</p>
                </div>
            </a>
        @empty
            <div class="grid py-3 border-t place-content-center">
                <span class="font-bold">¡No hay datos aun!</span>
            </div>
        @endforelse

    </div>
</div>
