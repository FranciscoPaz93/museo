<x-app-layout>
    <div class="px-8 ">
        <div class="flex items-center justify-between mt-5">
            <h1 class="py-3 text-2xl font-bold font-titilium">Regionales</h1>
            <div class="">

            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg ">
            <div>
                @livewire('regionals.table')
            </div>
        </div>
    </div>
</x-app-layout>
