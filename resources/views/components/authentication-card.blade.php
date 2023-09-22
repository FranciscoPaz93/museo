<div class="flex flex-col items-center w-full h-full pt-6 space-y-10 bg-white sm:justify-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
