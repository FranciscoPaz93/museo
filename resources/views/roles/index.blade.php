<x-app-layout>
    <div class="px-8 py-3">
        <div>
            <h1 class="text-2xl font-semibold font-titilium">Permisos y Usuarios</h1>
        </div>

        <div x-data="{ tab: 1 }">
            <div class="my-3 border-b border-gray-200">
                <ul class="flex space-x-5 text-lg text-gray-600">
                    <li class="p-3 py-3 font-medium" :class="tab == 1 ? 'border-b border-[#f67623]' : 'border-0'"
                        @click="tab=1">
                        Usuarios
                    </li>
                    <li class="px-3 py-3 font-medium" @click="tab=2"
                        :class="tab == 2 ? 'border-b border-[#f67623]' : 'border-0'">
                        Roles
                    </li>
                </ul>
            </div>
            <div>
                <div x-show="tab==1">
                    @livewire('roles.users')
                </div>
                <div x-show="tab==2">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
