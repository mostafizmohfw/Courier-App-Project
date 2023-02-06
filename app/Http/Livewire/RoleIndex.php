<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::all();
        // $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('livewire.role-index', [
            'roles' => $roles
        ]);
    }

        public function roleDelete($id) {
        permission_check('user-management');
        $role = Role::findOrFail($id);
        $role->delete();
        flash()->addSuccess('User deleted successfully');
    }
}
