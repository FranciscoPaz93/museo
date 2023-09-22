<x-guest-layout>
    <div class="grid h-[100vh] grid-cols-6  p-5">

        <div class="col-span-2 ">
            <img src="{{ asset('misc/hojas.jpg') }}" alt="" srcset=""
                class="object-cover w-full h-full rounded-lg">
            {{--  <div class="flex items-center justify-center flex-1 h-full">
                <div class="flex items-center space-x-5 ">
                    <div>
                        <img src="{{ asset('misc/logo.png') }}" class="h-28" alt="">
                    </div>
                    <div class="p-[1px] h-16 rounded-full bg-white"></div>
                    <div>
                        <p class="text-2xl font-bold text-white">MUSEO DE ENTOMOLOGÍA</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-span-4 ">
            <x-authentication-card>

                <x-slot name="logo">
                    <div>
                        <img src="{{ asset('misc/logo.png') }}" class="h-28" alt="">
                    </div>
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="text-gray-400" />
                        <x-input id="email"
                            class="block w-full mt-1 bg-gray-200 border-0 rounded-none focus:border-gray-900 placeholder:text-gray-400 focus:bg-white focus:border focus:ring-0 focus:outline-none"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            placeholder="ejem@email.com" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="text-gray-400" />
                        <x-input id="password"
                            class="block w-full mt-1 bg-gray-200 border-0 rounded-none focus:border-gray-900 placeholder:text-gray-400 focus:bg-white focus:border focus:ring-0 focus:outline-none"
                            type="password" name="password" required autocomplete="current-password"
                            placeholder="Contraseña" />
                    </div>

                    <div class="block mt-4">

                    </div>

                    <div class="flex items-center justify-end mt-4">


                        <x-button class="justify-center w-full py-3 mb-5 text-center shadow-lg bg-emerald-600">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>

        </div>
    </div>

    {{-- <div class="fixed top-0 z-1 p-[10%]">
        <div class="grid place-content-center w-[70%]">
            <div class="flex w-full ">
                <div class="w-full h-full p-32 bg-yellow-200">

                </div>

            </div>

        </div>
    </div>
--}}
</x-guest-layout>
