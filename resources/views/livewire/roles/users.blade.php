<div>
    <div class="flex justify-end">
        <button
            class="px-4 py-2 text-sm font-medium text-white bg-[#3b5932] rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
            wire:click="$toggle('showCreateModal')">Crear Usuario</button>
    </div>
    <div class="mt-3 bg-white rounded-md shadow-md">

        <div class="grid grid-cols-5 px-5 py-3 border-b">
            <div class="col-span-1 p-1 text-sm font-medium text-gray-500">Nombre</div>
            <div class="col-span-1 p-1 text-sm font-medium text-gray-500">Correo</div>
            <div class="col-span-1 p-1 text-sm font-medium text-gray-500">Role</div>
            <div class="col-span-1 p-1 text-sm font-medium text-gray-500">Creado</div>
            <div class="col-span-1 p-1 text-sm font-medium text-gray-500">Acciones</div>
        </div>
        <div>

            @foreach ($users as $user)
                <div class="grid items-center grid-cols-5 px-5 py-2 odd:bg-gray-100">
                    <div class="col-span-1 p-1 font-medium text-gray-500">{{ $user->name }}</div>
                    <div class="col-span-1 p-1 font-medium text-gray-500">{{ $user->email }}</div>
                    <div class="col-span-1 p-1 font-medium text-gray-500">{{ $user->roles }}</div>
                    <div class="col-span-1 p-1 font-medium text-gray-500">{{ $user->created_at }}</div>
                    <div class="col-span-1 p-1 font-medium text-gray-500">
                        <button
                            class="px-4 py-2 text-sm font-medium text-white bg-[#3b5932] rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            wire:click="showModifyPass({{ $user->id }})">Cambiar contraseña</button>
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-700 border rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            wire:click='showEditModal({{ $user->id }})'>Editar</button>
                        <button
                            class="px-4 py-2 text-sm font-medium text-red-500 border rounded-md hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            wire:click="deleteUser({{ $user->id }})">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-modal wire:model='showCreateModal'>
        <div>
            <div class="px-5 py-3 border-b">
                <div class="text-lg font-medium ">
                    <p>Crear Usuario</p>
                </div>
            </div>
            <div class="px-8 py-3">
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Nombre</p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="name">
                    @error('name')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Correo</p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="email">
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Contraseña <span class="px-3 cursor-pointer"
                            wire:click="generatePassword">Generar password</span></p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="password">

                    @error('password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>
            </div>
            <div class="flex justify-end px-8 py-3">
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-[#3b5932] rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    wire:click="createUser">Crear</button>
            </div>
        </div>

    </x-modal>
    <x-modal wire:model='showEditModal'>
        <div>
            <div class="px-5 py-3 border-b">
                <div class="text-lg font-medium ">
                    <p>Actualizar Usuario</p>
                </div>
            </div>
            <div class="px-8 py-3">
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Nombre</p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="name">
                    @error('name')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Correo</p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="email">
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>

            </div>
            <div class="flex justify-end px-8 py-3">
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-[#3b5932] rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    wire:click='updateUser({{ $user->id }})'>Crear</button>
            </div>
        </div>

    </x-modal>
    <x-modal wire:model='showModifyPassModal'>
        <div>
            <div class="px-5 py-3 border-b">
                <div class="text-lg font-medium ">
                    <p>Cambiar Contraseña</p>
                </div>
            </div>
            <div class="px-8 py-3">
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Nombre</p>
                    <p>{{ $name }}</p>
                </label>
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Correo</p>
                    <p>{{ $email }}</p>
                </label>
                <label for="">
                    <p class="py-1 text-sm font-medium text-gray-500 ">Contraseña <span class="px-3 cursor-pointer"
                            wire:click="generatePassword">Generar password</span></p>
                    <input type="text"
                        class="w-full p-1 bg-gray-200 border-0 rounded focus:border focus:border-gray-950 focus:bg-transparent focus:outline-none focus:ring-0"
                        wire:model="password">

                    @error('name')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </label>

            </div>
            <div class="flex justify-end px-8 py-3">
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-[#3b5932] rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    wire:click='updatePassword({{ $user_id }})'>Actualizar Password</button>
            </div>
        </div>

    </x-modal>
</div>
