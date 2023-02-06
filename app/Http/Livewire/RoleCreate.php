<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $selectedPermissions = [];
    public $name;

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.role-create', [
            'permissions' => $permissions
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'selectedPermissions' => 'required|array|min:1',
    ];

    public function submitForm(){
        $this->validate();
        $role = Role::create([
            'name' => $this->name
        ]);
        $role->syncPermissions($this->selectedPermissions);
        flash()->addSuccess('Role Created Successfull!');
        return redirect()->route('roles.index');
    }
}
