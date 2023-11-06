<div>
    <button wire:click="$toggle('showModal')"
        class="px-5 py-2 inline-block font-bold hover:text-white text-[#375930] hover:bg-[#37593055] border border-[#37593055] rounded ">
        Editar
    </button>
    <x-modal wire:model='showModal' maxWidth="4xl">
        <div class="">
            <div class="px-5 py-3 border-b">
                <p class="text-base font-bold uppercase">Editar</p>
                <div class="flex">
                    <p class="text-lg font-bold">{{ $collection->code }} - </p>
                    <p class="text-xl font-bold">{{ $collection->place }}</p>
                </div>
            </div>
            <div class="px-8 py-3">
                <div class="grid grid-cols-2 gap-4">

                    <div class="col-span-1">
                        <p class="mb-2 text-lg font-semibold">Ubicación</p>
                        <div class=" border-l-4 border-[#375930]  px-5">
                            <label for="" class="block mb-3">
                                <p>Departmaneto:</p>
                                <select name="" id=""
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]"
                                    wire:model="department_id">
                                    <option value="">Seleccionar</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="" class="block mb-3">
                                <p>Municipio:</p>
                                <select name="" id=""
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]"
                                    wire:model='municipality_id'>
                                    <option value="">Seleccionar</option>
                                    @foreach ($municipalities as $municipality)
                                        <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="" class="block mb-3">
                                <p>Lugar:</p>
                                <input name="" id=""
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='place' />
                            </label>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <p class="mb-2 text-lg font-semibold">Georeferenciación</p>
                        <div class=" border-l-4 border-[#375930]  px-5">
                            <label for="" class="block mb-3">
                                <p>Longitud:</p>
                                <input name="" id="" type="text"
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]"
                                    wire:model='longitude' />

                            </label>
                            <label for="" class="block mb-3">
                                <p>Latitud:</p>
                                <input name="" id="" type="number"
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]"
                                    wire:model='latitude' />
                            </label>
                            <label for="">
                                <p>Altitud:</p>
                                <input name="" id="" type="number"
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]"
                                    wire:model='altitude' />
                            </label>
                        </div>
                    </div>
                </div>
                @if ($geoModify)
                    <div>
                        <p class="mb-2 text-lg font-semibold">Información sobre modificación de Georeferencia </p>
                        <div class=" border-l-4 border-[#375930]  px-5">
                            <label for="" class="block mb-3">
                                <p>Rason:</p>
                                <select name="" id=""
                                    class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='reason'>
                                    <option value="">Seleccionar</option>
                                    <option value="Error en la georeferencia">Error en la georeferencia</option>
                                    <option value="Quema / Incendio">Quema / Incendio</option>
                                    <option value="Robo">Robo</option>

                                </select>
                            </label>
                        </div>
                        <button class="text-[#f67623]" wire:click='restoreLastValues'>Cancelar modificación</button>
                    </div>
                @endif
            </div>
            <div class="px-5 py-3 border-t">
                <div class="flex justify-end">
                    <button wire:click='updateCollection'
                        class="px-5 py-2 font-bold text-white bg-[#375930] border-2 border-[#375930] rounded">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </x-modal>
</div>
