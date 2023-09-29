<div>
    <div class="grid grid-cols-1 gap-3 md:grid-cols-4 2xl:grid-cols-6 ">

        @foreach ($lastIterations as $iteration)
            <a href="{{ route('collection-iterations.show', $iteration) }}"
                class="relative col-span-1 p-5 bg-white border border-gray-200 rounded hover:border-green-500">
                <div class="flex space-x-2">
                    <div class="w-1/2 pb-5">
                        <p class="text-xs font-medium">Colecta</p>
                        <p class="font-bold">{{ $iteration->collection->code }}</p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-xs font-medium">Colector</p>
                        <p class="font-bold">{{ $iteration->collector }}</p>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="">
                        <p class="text-xs font-medium">Fecha</p>
                        <p class="font-bold">{{ $iteration->date }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium">Cantidad de Botes</p>
                        <p class="font-bold">
                            {{ $iteration->jars->count() }} <span class="text-xs text-gray-600">/bote</span>
                        </p>
                    </div>
                </div>
                @if ($iteration->period == 1)
                    <span class="absolute top-0 right-0 px-2 font-bold text-white bg-green-600 bsolute">1</span>
                @elseif ($iteration->period == 2)
                    <span class="absolute top-0 right-0 px-2 font-bold text-white bg-yellow-600">2</span>
                @endif
            </a>
        @endforeach

    </div>
</div>
