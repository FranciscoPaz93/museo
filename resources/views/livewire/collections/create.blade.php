<div>
    <div class="my-3 bg-white border border-gray-200 rounded-lg">
        <div class="px-5 py-3 border-b ">
            <h2 class="text-xl font-semibold text-[#375930]">
                <i class='bx bx-news'></i>
                Formulario de creación de colecta
            </h2>
        </div>
        <div class="grid grid-cols-4 p-8 py-5 gap-x-8">
            <div class="col-span-1">
                <p class="mb-2 text-lg font-semibold">Ubicación</p>
                <div class=" border-l-4 border-[#375930]  px-5">
                    <label for="" class="block mb-3">
                        <p>Departmaneto:</p>
                        <select name="" id=""
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model="department_id">
                            <option value="">Seleccionar</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="" class="block mb-3">
                        <p>Municipio:</p>
                        <select name="" id=""
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='municipality_id'>
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
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='longitude' />

                    </label>
                    <label for="" class="block mb-3">
                        <p>Latitud:</p>
                        <input name="" id="" type="number"
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='latitude' />
                    </label>
                    <label for="">
                        <p>Altitud:</p>
                        <input name="" id="" type="number"
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" wire:model='altitude' />
                    </label>
                </div>
            </div>
            <div class="col-span-2">
                <p class="mb-2 text-lg font-semibold">Información</p>
                <div class=" border-l-4 border-[#375930]  px-5">
                    <label for="" class="block mb-3">
                        <p>Código:</p>
                        <input name="" id="" wire:model='code'
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623] uppercase" />

                    </label>
                    <label for="">
                        <p>Creado por:</p>
                        <input name="" id="" disabled value="{{ auth()->user()->name }}"
                            class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" />
                    </label>
                </div>
            </div>
        </div>
        <div class="border-t">
            <div class="flex justify-end px-5 py-3">
                <button wire:click='storeCollection'
                    class="px-5 py-2 font-bold text-white bg-[#375930] rounded">Guardar</button>
            </div>
        </div>
    </div>
</div>
