<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Component
{
    public $selectedPermissions = [];
    public $name;

    public function render()
    {
        return view('livewire.permission-create');
    }

    protected $rules = [
        'name' => 'required|unique:permissions,name',
    ];

    public function submitForm(){
        $this->validate();
        $role = Permission::create([
            'name' => $this->name
        ]);

        flash()->addSuccess('Permission Created Successfull!');
        return redirect()->route('permissions.index');
    }
}
