<div>
    <div wire:loading wire:target="showModal">
        <div
            style="display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            position:fixed;
            top:0px;
            left:0px;
            z-index: 9999;
            width: 100%;
            height: 100%; opacity: .75;">
            <div style="color: #375930" class="la-ball-fussion la-3x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <button wire:click="$toggle('showModal')"
        class="px-5 py-2 border border-[#375930] text-[#375930] font-semibold rounded text-sm ">
        Agregar Clasificacion
    </button>
    <x-modal wire:model='showModal' maxWidth="7xl">
        <div class="">
            <div class="px-5 py-3 border-b">
                <p class="text-base font-bold uppercase">Crear nueva clasificación</p>
                <div class="flex">
                </div>
            </div>
            <div class="flex border-b">
                <div class="px-3 py-1 border-r">
                    #
                </div>
                <div></div>
                <div class="grid w-full grid-cols-9 text-sm font-semibold divide-x ">
                    <div class="col-span-1 p-1">
                        Orden<span class="text-red-500">*</span>
                    </div>
                    <div class="col-span-2 p-1">
                        Familia <span class="text-red-500">*</span>
                    </div>
                    <div class="col-span-1 p-1">
                        Subfamilia <span class="text-red-500">*</span>
                    </div>
                    <div class="col-span-2 p-1">
                        Genero<span class="text-red-500">*</span>
                    </div>
                    <div class="col-span-1 p-1">
                        Especie<span class="text-red-500">*</span>
                    </div>
                    <div class="col-span-2 p-1 truncate">
                        Genitalia<span class="text-red-500">*</span>
                    </div>
                </div>
            </div>
            <div class="flex border-b">
                <div class="px-3 py-1 border-r">
                    #
                </div>
                <div class="grid w-full grid-cols-9 text-sm font-medium " wire:ignore>
                    <div class="col-span-1 p-1">
                        <label for="">
                            <input type="text" list="orders"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="order" />
                            <datalist id="orders">
                                @forelse ($orders as $order)
                                    <option value="{{ $order->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </datalist>
                        </label>
                    </div>
                    <div class="col-span-2 p-1">
                        <label for="">
                            <input type="text" list="families"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="family" />
                            <datalist id="families">
                                @forelse ($families as $family)
                                    <option value="{{ $family->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </datalist>
                        </label>
                    </div>
                    <div class="col-span-1 p-1">
                        <label for="">
                            <input type="text" list="subfamilies"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="subfamily" />
                            <datalist id="subfamilies">
                                @forelse ($subfamilies as $subfamily)
                                    <option value="{{ $subfamily->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </datalist>
                        </label>
                    </div>
                    <div class="col-span-2 p-1">
                        <label for="">
                            <input type="text" list="genus"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="gender" />
                            <datalist id="genus">
                                @forelse ($genus as $gen)
                                    <option value="{{ $gen->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </datalist>
                        </label>
                    </div>
                    <div class="col-span-1 p-1">
                        <label for="">
                            <input type="text" list="species"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="speci" />
                            <datalist id="species">
                                @forelse ($species as $specie)
                                    <option value="{{ $specie->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </datalist>
                        </label>
                    </div>
                    <div class="col-span-2 p-1 truncate">
                        <label for="">
                            <input type="text" list="genitalia"
                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                wire:model="genitalium" />
                            <datalist id="genitalia">
                                @forelse ($genitalia as $genitali)
                                    <option value="{{ $genitali->name }}"></option>
                                @empty
                                    <option value=""></option>
                                @endforelse

                            </datalist>
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-3 border-t">
                <div class="flex justify-end space-x-3">
                    <button wire:click="$toggle('showModal')"
                        class="px-5 py-2 font-bold hover:text-white text-[#375930] hover:bg-[#37593055] border border-[#37593055] rounded ">Cancelar</button>

                    <button wire:click="store"
                        class="px-5 py-2 font-bold text-white bg-[#375930] rounded">Guardar</button>
                </div>
            </div>
        </div>
    </x-modal>

    <style>
        .la-ball-fussion,
        .la-ball-fussion>div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .la-ball-fussion {
            display: block;
            font-size: 0;
            color: #fff;
        }

        .la-ball-fussion.la-dark {
            color: #333;
        }

        .la-ball-fussion>div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }

        .la-ball-fussion {
            width: 8px;
            height: 8px;
        }

        .la-ball-fussion>div {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-animation: ball-fussion-ball1 1s 0s ease infinite;
            -moz-animation: ball-fussion-ball1 1s 0s ease infinite;
            -o-animation: ball-fussion-ball1 1s 0s ease infinite;
            animation: ball-fussion-ball1 1s 0s ease infinite;
        }

        .la-ball-fussion>div:nth-child(1) {
            top: 0;
            left: 50%;
            z-index: 1;
        }

        .la-ball-fussion>div:nth-child(2) {
            top: 50%;
            left: 100%;
            z-index: 2;
            -webkit-animation-name: ball-fussion-ball2;
            -moz-animation-name: ball-fussion-ball2;
            -o-animation-name: ball-fussion-ball2;
            animation-name: ball-fussion-ball2;
        }

        .la-ball-fussion>div:nth-child(3) {
            top: 100%;
            left: 50%;
            z-index: 1;
            -webkit-animation-name: ball-fussion-ball3;
            -moz-animation-name: ball-fussion-ball3;
            -o-animation-name: ball-fussion-ball3;
            animation-name: ball-fussion-ball3;
        }

        .la-ball-fussion>div:nth-child(4) {
            top: 50%;
            left: 0;
            z-index: 2;
            -webkit-animation-name: ball-fussion-ball4;
            -moz-animation-name: ball-fussion-ball4;
            -o-animation-name: ball-fussion-ball4;
            animation-name: ball-fussion-ball4;
        }

        .la-ball-fussion.la-sm {
            width: 4px;
            height: 4px;
        }

        .la-ball-fussion.la-sm>div {
            width: 6px;
            height: 6px;
        }

        .la-ball-fussion.la-2x {
            width: 16px;
            height: 16px;
        }

        .la-ball-fussion.la-2x>div {
            width: 24px;
            height: 24px;
        }

        .la-ball-fussion.la-3x {
            width: 24px;
            height: 24px;
        }

        .la-ball-fussion.la-3x>div {
            width: 36px;
            height: 36px;
        }

        /*
     * Animations
     */
        @-webkit-keyframes ball-fussion-ball1 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 100%;
                z-index: 2;
                opacity: .35;
            }
        }

        @-moz-keyframes ball-fussion-ball1 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 100%;
                z-index: 2;
                opacity: .35;
            }
        }

        @-o-keyframes ball-fussion-ball1 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 100%;
                z-index: 2;
                opacity: .35;
            }
        }

        @keyframes ball-fussion-ball1 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 100%;
                z-index: 2;
                opacity: .35;
            }
        }

        @-webkit-keyframes ball-fussion-ball2 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 100%;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @-moz-keyframes ball-fussion-ball2 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 100%;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @-o-keyframes ball-fussion-ball2 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 100%;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @keyframes ball-fussion-ball2 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: 200%;
                opacity: 1;
            }

            100% {
                top: 100%;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @-webkit-keyframes ball-fussion-ball3 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 0;
                z-index: 2;
                opacity: .35;
            }
        }

        @-moz-keyframes ball-fussion-ball3 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 0;
                z-index: 2;
                opacity: .35;
            }
        }

        @-o-keyframes ball-fussion-ball3 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 0;
                z-index: 2;
                opacity: .35;
            }
        }

        @keyframes ball-fussion-ball3 {
            0% {
                opacity: .35;
            }

            50% {
                top: 200%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 50%;
                left: 0;
                z-index: 2;
                opacity: .35;
            }
        }

        @-webkit-keyframes ball-fussion-ball4 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 0;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @-moz-keyframes ball-fussion-ball4 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 0;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @-o-keyframes ball-fussion-ball4 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 0;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }

        @keyframes ball-fussion-ball4 {
            0% {
                opacity: .35;
            }

            50% {
                top: -100%;
                left: -100%;
                opacity: 1;
            }

            100% {
                top: 0;
                left: 50%;
                z-index: 1;
                opacity: .35;
            }
        }
    </style>

</div>
