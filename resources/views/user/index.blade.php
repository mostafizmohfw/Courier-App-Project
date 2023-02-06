<x-app-layout>
   <x-slot name="header">
      <div class="flex justify-between items-center">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Lists') }}
         </h2>
         <div class="flex items-center">
            <a title="User Role" class="lms-btn mr-4" href="{{ route('roles.index') }}">
               {{-- @include('components.icons.add') --}}
               Roles
            </a>

            <a title="User Permission" class="lms-btn mr-4" href="{{ route('permissions.index') }}">
               {{-- @include('components.icons.add') --}}
               Permissions
            </a>

            <a title="Add New" class="lms-btn" href="{{ route('users.create') }}">
               {{-- @include('components.icons.add') --}}
               Add New User
            </a>
         </div>
      </div>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
               <livewire:user-index />
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
