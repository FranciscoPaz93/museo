<div>
    <div wire:loading wire:target='saveBug'>
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
    <div class="my-5 bg-white border border-gray-200 rounded-lg ">
        <div class="px-5 py-3 border-b">
            <p class="text-lg font-bold">Botes</p>
        </div>
        <ul class="border-collapse">
            @foreach ($jars as $jar)
                <li class="px-5 py-2 border-b">
                    <div class="font-semibold">
                        {{ $jar->code }} <button wire:click="$set('jarSelectedId',{{ $jar->id }})">edit</button>
                    </div>
                    <div>
                        <div class="hidden p-2 text-sm italic lg:flex text-[#375930]">
                            <div class="w-10">#</div>
                            <div
                                class="grid flex-1 grid-cols-3 font-medium sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-9 ">

                                <div class="col-span-1 p-1">
                                    Orden
                                </div>
                                <div class="col-span-1 p-1">
                                    Familia
                                </div>
                                <div class="col-span-1 p-1">
                                    Subfamilia
                                </div>
                                <div class="col-span-1 p-1">
                                    Genero
                                </div>
                                <div class="col-span-1 p-1">
                                    Especie
                                </div>
                                <div class="col-span-1 p-1 truncate">
                                    Genitalia
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
                            <div>
                                <p class="">Acciones</p>
                            </div>
                        </div>
                        @foreach ($jar->bugs as $bug)
                            <x-bug-row :bug="$bug" :loop="$loop->iteration" />
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <x-modal wire:model="showModal" maxWidth="75">
        <div>

            <div class="px-5 py-3 text-xl border-b ">
                <div class="flex items-center justify-between">
                    <p>
                        Editar Bote
                    </p>
                    @livewire('collection-iteration.common.create-clasification')
                </div>
            </div>

            <div>
                @if ($jarSelectedId)
                    <div class="px-5" x-data={show:true}>
                        <div class="grid grid-cols-2 gap-5">
                            <div x-show="show">
                                <label for="code" class="block text-sm font-semibold text-gray-600">Código</label>
                                <p class="font-semibold">
                                    {{ $jarSelected->code }}
                                    <i class="cursor-pointer bx bx-edit" @click="show=false"></i>
                                </p>
                            </div>
                            <div x-show="!show">
                                <label for="code" class="block text-sm font-semibold text-gray-600">Código</label>
                                <p>
                                    {{ explode('-', $jarSelected->code)[0] }}-
                                    <input type="text" wire:model="jarCodeUpdate"
                                        class="w-12 p-2 text-center bg-gray-100 border-0 rounded-md">
                                    -{{ explode('-', $jarSelected->code)[2] }}
                                    <button wire:click='updateJar'>
                                        <i class="cursor-pointer bx bx-save"></i>
                                    </button>
                                    <button @click="show=true">
                                        <i class="cursor-pointer bx bx-x"></i>
                                    </button>
                                </p>
                                @error('jarCodeUpdateComplete')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="p-5">
                <div class="flex border">
                    <div class="px-3 py-1 border-r">
                        #
                    </div>
                    <div class="grid w-full grid-cols-12 text-sm font-semibold divide-x ">
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
                        <div class="col-span-1 p-1">
                            Sexo<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Color<span class="text-red-500">*</span>
                        </div>
                        <div class="col-span-1 p-1">
                            Tamaño<span class="text-red-500">*</span>
                        </div>
                    </div>
                    <div class="w-24 px-3 py-1 text-sm font-semibold border-l">
                        Acciones
                    </div>
                </div>
                @if ($jarSelectedId)
                    @forelse ($jarSelected->bugs as $lbug)
                        <div class="flex border hover:bg-[#]">
                            @if ($bugSelected['id'] == $lbug->id)
                                <div class="px-3 py-1 border-r">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="grid w-full grid-cols-12 text-sm font-medium ">
                                    <div class="col-span-1 p-1">
                                        <label for="">

                                            <select
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.order">
                                                <option value="" hidden>Seleccionar</option>
                                                @foreach ($orders as $order)
                                                    <option value="{{ $order->name }}">{{ $order->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-2 p-1">
                                        <label for="">

                                            <select @if (!isset($bugSelected['order'])) disabled @endif
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.family">
                                                <option value="" hidden>Seleccionar</option>
                                                @forelse ($families as $family)
                                                    <option value="{{ $family->name }}">{{ $family->name }}
                                                    </option>
                                                    @if ($loop->last)
                                                        <option value="N/A">N/A</option>
                                                    @endif
                                                @empty
                                                    <option value="N/A">N/A</option>
                                                @endforelse

                                            </select>

                                        </label>
                                    </div>
                                    <div class="col-span-1 p-1">
                                        <label for="">
                                            <select @if (!isset($bugSelected['family'])) disabled @endif
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.subfamily">
                                                <option value="" hidden>Seleccionar</option>
                                                @forelse ($subfamilies as $subfamily)
                                                    <option value="{{ $subfamily->name }}">{{ $subfamily->name }}
                                                    </option>
                                                    @if ($loop->last)
                                                        <option value="N/A">N/A</option>
                                                    @endif
                                                @empty
                                                    <option value="N/A">N/A</option>
                                                @endforelse
                                            </select>
                                        </label>
                                    </div>

                                    <div class="col-span-2 p-1">
                                        <label for="">

                                            <select @if (!isset($bugSelected['subfamily'])) disabled @endif
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.genus">
                                                <option value="" hidden>Seleccionar</option>
                                                @forelse ($genus  as $genu)
                                                    <option value="{{ $genu->name }}">{{ $genu->name }}
                                                    </option>
                                                    @if ($loop->last)
                                                        <option value="N/A">N/A</option>
                                                    @endif
                                                @empty
                                                    <option value="N/A">N/A</option>
                                                @endforelse
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-1 p-1">
                                        <label for="">
                                            <select @if (!isset($bugSelected['genus'])) disabled @endif
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.species">
                                                <option value="" hidden>Seleccionar</option>
                                                @forelse ($species as $specie)
                                                    <option value="{{ $specie->name }}">{{ $specie->name }}
                                                    </option>
                                                    @if ($loop->last)
                                                        <option value="N/A">N/A</option>
                                                    @endif
                                                @empty
                                                    <option value="N/A">N/A</option>
                                                @endforelse
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-2 p-1 truncate">
                                        <label for="">
                                            <select @if (!isset($bugSelected['species'])) disabled @endif
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.genitalia">
                                                <option value="" hidden>Seleccionar</option>
                                                @forelse ($genitalia as $geni)
                                                    <option value="{{ $geni->name }}">{{ $geni->name }}
                                                    </option>
                                                    @if ($loop->last)
                                                        <option value="N/A">N/A</option>
                                                    @endif
                                                @empty
                                                    <option value="N/A">N/A</option>
                                                @endforelse
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-1 p-1">
                                        <label for="">
                                            <select
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.gender">
                                                <option value="" hidden>Seleccionar</option>
                                                <option value="Macho">Macho</option>
                                                <option value="Hembra">Hembra</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-1 p-1">
                                        <label for="">
                                            <select
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.color">
                                                <option value="" hidden>Seleccionar</option>

                                                <option value="café oscuro">Café oscuro</option>
                                                <option value="café claro">Café claro</option>
                                                <option value="Amatillo">Amatillo</option>
                                                <option value="Negro">Negro</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-span-1 p-1">
                                        <label for="">
                                            <input
                                                class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-300 focus:bg-transparent focus:outline-none focus:ring-0"
                                                wire:model="bugSelected.size">

                                        </label>
                                    </div>

                                </div>

                                <div class="flex items-center justify-center w-24 px-3 space-x-3 border-l">
                                    <button class="inline-flex" wire:click='saveBug'><i
                                            class="bx bx-save"></i></button>
                                    <button class="inline-flex" wire:click="editBug({{ $lbug->id }})"><i
                                            class="bx bx-reset"></i></button>
                                </div>

                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-500 rounded">
                                        <p class="px-3 py-1 text-sm font-medium text-red-500">
                                            {{ $errors->first() }}
                                        </p>
                                    </div>
                                @endif
                            @else
                                <div class="px-3 py-1 border-r">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="grid w-full grid-cols-12 text-sm font-medium font-openSans ">
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->order }}
                                    </div>
                                    <div class="col-span-2 p-1">
                                        {{ $lbug->family }}
                                    </div>
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->subfamily }}
                                    </div>
                                    <div class="col-span-2 p-1">
                                        {{ $lbug->genus }}
                                    </div>
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->species }}
                                    </div>
                                    <div class="col-span-2 p-1 truncate">
                                        {{ $lbug->genitalia }}
                                    </div>
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->gender }}
                                    </div>
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->color }}
                                    </div>
                                    <div class="col-span-1 p-1">
                                        {{ $lbug->size }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-24 px-3 space-x-3 border-l"
                                    wire:loading.remove wire:target='editBug'>
                                    <!--button class="inline-flex" wire:click="deleteBug({{ $lbug->id }})"><i
                                            class="bx bx-trash"></i></button-->
                                    <button class="inline-flex" wire:click="editBug({{ $lbug->id }})"><i
                                            class="bx bx-edit"></i></button>
                                </div>
                                <div class="flex items-center justify-center hidden w-24"
                                    wire:loading.class.remove='hidden'>
                                    <i class='bx bx-loader-circle bx-spin bx-rotate-180'></i>
                                </div>
                            @endif
                        </div>
                    @empty
                    @endforelse

                @endif
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
