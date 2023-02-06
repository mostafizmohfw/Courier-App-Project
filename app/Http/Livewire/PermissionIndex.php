<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionIndex extends Component
{
    public function render()
    {
        $permission= Permission::latest()->get();
        return view('livewire.permission-index',[
            'permissions'=>$permission
        ]);
    }

    public function permissionDelete($id) {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        flash()->addSuccess('Permission deleted successfully');
    }
}
