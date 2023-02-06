<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user-create',[
            'roles' => $roles
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required',
    ];

    public function submitForm(){
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $user->assignRole($this->role);
        flash()->addSuccess('User Created Successfull!');
        return redirect()->route('users.index');
    }
}
