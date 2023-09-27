<div>
    <div class=" sm:px-6 lg:px-8">
        <div class=" sm:rounded-lg b">
            <div class="grid grid-cols-2 gap-5 md:grid-cols-4 2xl:grid-cols-6">
                <div class="col-span-1 bg-white border border-gray-200 rounded">
                    <div class="flex items-center min-h-full space-x-5">
                        <div class="">
                            <img src="{{ asset('misc/svg/undraw_scrum_board_re_wk7v.svg') }}" alt=""
                                class="">
                        </div>
                        <div class="h-full px-5">
                            <p class="text-lg font-medium text-gray-800">Regionales</p>
                            <p class="text-2xl font-bold">{{ $stats['regionals'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 bg-white border border-gray-200 rounded">
                    <div class="flex items-center min-h-full space-x-5">
                        <div class=""><img src="{{ asset('misc/svg/undraw_lost_re_xqjt.svg') }}" alt="">
                        </div>
                        <div class="px-5">
                            <p class="text-lg font-medium text-gray-800">Colectas</p>
                            <p class="text-2xl font-bold">{{ $stats['collections'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 bg-white border border-gray-200 rounded">
                    <div class="flex items-center min-h-full space-x-5">
                        <div class="px-3 "><img src="{{ asset('misc/svg/undraw_hire_re_gn5j.svg') }}" alt=""
                                class=""></div>
                        <div class="px-5">
                            <p class="text-lg font-medium text-gray-800">Usuarios</p>
                            <p class="text-2xl font-bold">{{ $stats['users'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 bg-white border border-gray-200 rounded">
                    <div class="flex items-center min-h-full space-x-5">
                        <div class="px-3 "><img src="{{ asset('misc/svg/undraw_fixing_bugs_w7gi.svg') }}"
                                alt="" class=""></div>
                        <div class="px-5">
                            <p class="text-lg font-medium text-gray-800">Insectos</p>
                            <p class="text-2xl font-bold">{{ $stats['bugs'] }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
