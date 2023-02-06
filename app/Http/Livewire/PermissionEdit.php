<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{
    public $permission_id;
    public $name;

    public function mount() {
        $permission = Permission::findOrFail($this->permission_id);
        $this->permission_id = $permission->id;
        $this->name = $permission->name;
    }

    public function render()
    {
        $permission = Permission::findOrFail($this->permission_id);
        return view('livewire.permission-edit',[
            'permission' => $permission,
        ]);
    }

    protected $rules = [
        'name' => 'required',
        // 'name' => 'required|unique:permissions,name,'.$this->permission_id,
    ];

    public function submitForm() {
        $permission = Permission::findOrFail($this->permission_id);
        $this->validate();
        $permission->name = $this->name;
        $permission->save();

        flash()->addSuccess('Permision updated successfully');
        return redirect()->route('permissions.index');
    }
}
