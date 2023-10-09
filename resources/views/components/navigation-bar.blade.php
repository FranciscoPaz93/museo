<div class="border-b ">
    <div class="flex items-end px-8 mx-auto bg-[#22331d] 2xl:container py-3">

        <div class="hidden space-x-8 sm:-my-px sm:ml-3 sm:flex ">
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link href="{{ route('collections.index') }}" :active="request()->routeIs('collections.*')">
                {{ __('Colectas') }}
            </x-nav-link>
            <x-nav-link href="{{ route('regionals.index') }}" :active="request()->routeIs('regionals.*')">
                {{ __('Regionales') }}
            </x-nav-link>
        </div>
    </div>

</div>
