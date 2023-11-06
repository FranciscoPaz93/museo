<x-app-layout>
    <div class="px-8 py-5">
        <div class="flex justify-between w-full space-x-8">
            <div class="flex space-x-8">
                <div>
                    <div class="w-32 p-3 bg-white border-[5px] border-gray-300 rounded-2xl">
                        <img src="{{ asset('misc/svg/undraw_map_re_60yf.svg') }}" alt="" class="rounded-2xl">
                    </div>
                </div>
                <div class="pt-2 text-sm">
                    <p class="text-lg font-medium">Crear Colecta</p>
                    <p class="text-xl font-medium "><span class="text-gray-400">En </span>{{ $regional->name }}</p>
                </div>
            </div>
            <div class="py-3">
                <div class="bg-white border border-gray-200 rounded-lg ">
                    <div class="grid grid-cols-3 divide-x divide-y">
                        <div class="col-span-1 p-5">
                            <p class="text-sm font-medium">Departamentos</p>
                            <p class="text-lg font-bold text-gray-800">{{ $regional->departaments }}</p>
                        </div>
                        <div class="col-span-1 p-5">
                            <p class="text-sm font-medium">Codigo</p>
                            <p class="text-lg font-bold text-gray-800">{{ $regional->identity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('collections.create', ['regional' => $regional])
    </div>
</x-app-layout>
