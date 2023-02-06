<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{
    public $role_id;
    public $name;
    public $selectedPermissions = [];

    public function mount() {
        $role = Role::findOrFail($this->role_id);
        $role->permissions->pluck('name');
        // dd($role->permissions);
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name');
    }

    public function render()
    {
        $role = Role::findOrFail($this->role_id);
        $permissions = Permission::get();
        return view('livewire.role-edit',[
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    protected $rules = [
        'name' => 'required',
    ];

    public function submitForm() {
        $role = Role::findOrFail($this->role_id);
        $this->validate();
        $role->name = $this->name;
        $role->save();
        $role->syncPermissions($this->selectedPermissions);
        flash()->addSuccess('Role updated successfully');
        return redirect()->route('roles.index');
    }
}
