<x-app-layout>
   <x-slot name="header">
      <div class="flex justify-between items-center">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Lists') }}
         </h2>
         <div class="flex items-center space-x-8">
            <a title="permision" class="lms-btn" href="{{ route('permissions.index') }}">
               Permisions
            </a>
            <a title="Add New" class="lms-btn" href="{{ route('roles.create') }}">
               {{-- @include('components.icons.add') --}}
               Add New Role
            </a>
         </div>
      </div>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
               <livewire:role-index />
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
