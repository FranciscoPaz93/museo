<div>
    <button wire:click="$toggle('showModal')"
        class="px-5 py-2 font-bold text-white bg-[#375930] border-2 border-[#375930] rounded">
        Crear region Forestal
    </button>
    <x-modal wire:model='showModal' maxWidth="2xl">
        <div class="">
            <div class="px-5 py-3 border-b">
                <p class="text-base font-bold uppercase">Crear nueva Region Forestal</p>
                <div class="flex">
                </div>
            </div>
            <div class="grid px-8 py-3">
                <div class="col-span-1">
                    <p class="mb-2 text-lg font-semibold">General</p>
                    <div class=" border-l-4 border-[#375930]  px-5">
                        <label for="">
                            <p class="mb-2 text-lg font-semibold">Nombre</p>
                            <input name="" id="" type="text" wire:model='name'
                                class="w-full bg-gray-100 border-0 rounded focus:ring-[#f67623]" />
                        </label>
                        <label for="">
                            <p class="mb-2 text-lg font-semibold">Código</p>
                            <input name="" id="" type="text" wire:model='identity'
                                class="w-64 bg-gray-100 border-0 rounded focus:ring-[#f67623]" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-3 border-t">
                <div class="flex justify-end space-x-3">
                    <button wire:click="$toggle('showModal')"
                        class="px-5 py-2 font-bold hover:text-white text-[#375930] hover:bg-[#37593055] border border-[#37593055] rounded ">Cancelar</button>
                    <button wire:click="createRegional"
                        class="px-5 py-2 font-bold text-white bg-[#375930] rounded">Guardar</button>
                </div>
            </div>
        </div>
    </x-modal>

</div>
