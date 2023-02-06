<div>
   <table class="w-full table-auto">
      <tr class="bg-gray-200 rounded-t">
         <th class="text-left border px-4 py-1">Name:</th>
         <th class="text-left border px-4 py-1">Permission Guard:</th>
         <th class="text-center border px-4 py-1">Actions:</th>
      </tr>
      @foreach ($permissions as $permission)
         <tr>
            <td class="text-left border px-4 py-1">{{ $permission->name }}</td>
            <td class="text-left border px-4 py-1 flex">{{ $permission->guard_name }}</td>
            <td class="border px-4 py-1">
               <div class="flex justify-center text-center items-center space-x-2">
                  <a class="bg-green-600 text-white p-1 rounded" href="{{ route('permissions.edit', $permission->id) }}">
                     @include('components.icons.edit')
                  </a>
                  <form onsubmit="return confirm('Are you sure?');"
                     wire:submit.prevent="permissionDelete({{ $permission->id }})"
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
