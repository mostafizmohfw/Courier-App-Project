<div>
   <table class="w-full table-auto">
      <tr class="bg-gray-200 rounded-t">
         <th class="text-left border px-4 py-1">Name:</th>
         <th class="text-left border px-4 py-1">Permission Guard:</th>
         <th class="text-center border px-4 py-1">Actions:</th>
      </tr>
      @foreach ($roles as $role)
         <tr>
            <td class="text-left border px-4 py-1">{{ $role->name }}</td>
            <td class="text-left border px-4 py-1 flex gap-1">
               @foreach ($role->permissions as $permission)
                  <span class="bg-slate-700 text-white py-1 px-2 mx-1 rounded gap-1"> {{ $permission->name }}</span>
               @endforeach
            </td>
            <td class="border px-4 py-1">
               <div class="flex justify-center text-center items-center space-x-2">
                  <a class="bg-green-600 text-white p-1 rounded" href="{{ route('roles.edit', $role->id) }}">
                     @include('components.icons.edit')
                  </a>
                  <form onsubmit="return confirm('Are you sure?');"
                     wire:submit.prevent="roleDelete({{ $role->id }})"
                     class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                     <button type="submit">
                        @include('components.icons.delete')
                     </button>
                  </form>
               </div>
            </td>
         </tr>
      @endforeach

   </table>
</div>
