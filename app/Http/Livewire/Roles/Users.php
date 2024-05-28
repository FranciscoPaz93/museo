<?php

namespace App\Http\Livewire\Roles;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showModifyPassModal = false;
    public $name;
    public $email;
    public $password;
    public $user_id;
    public $role_id;
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        $users = User::all();


        return view('livewire.roles.users', compact('users'));
    }

    public function deleteUser($id)
    {
        try {
            if ($id == auth()->user()->id) {
                session()->flash('flash.banner', 'No se puede eliminar el usuario actual');
                return redirect()->route('roles.index');
            }
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'Error al eliminar usuario',
                'text' => '',
            ]);
        }
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user  = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        session()->flash('flash.banner', 'Isuario creado Exisitosamente');
        $user->save();

        return redirect()->route('roles.index');
    }



    public function showEditModal($id)
    {
        $this->showEditModal = true;
        $fuser = User::find($id);
        $this->user_id = $fuser->id;
        $this->name = $fuser->name;
        $this->email = $fuser->email;
        $this->role_id = $fuser->roles?->first()?->id;
    }



    public function updateUser($id)
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        try {
            DB::beginTransaction();
            $nuser = User::find($id);
            $nuser->name = $this->name;
            $nuser->email = $this->email;
            $nuser->save();
            DB::commit();
            session()->flash('flash.banner', 'Usuario actualizado Exisitosamente');
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());

            $this->addError('error', $e->getMessage());
        } finally {
            $nuser->syncRoles($this->role_id);
        }
    }

    public function updatedShowCreateModal()
    {
        $this->reset(['name', 'email', 'password']);
    }

    public function showModifyPass($id)
    {
        $this->showModifyPassModal = true;
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updatePassword($id)
    {
        $this->validate([
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->password = bcrypt($this->password);

        session()->flash('flash.banner', 'Contraseña actualizada Exisitosamente');
        $user->save();

        return redirect()->route('roles.index');
    }

    public function generatePassword()
    {
        $this->password = Str::random(10);
    }
}
