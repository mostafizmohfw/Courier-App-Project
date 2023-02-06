<x-app-layout>
   <x-slot name="header">
      <div class="flex justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Edit') }}
         </h2>
         <a title="Add New" class="lms-btn" href="{{ route('permissions.index') }}">
            back
         </a>
      </div>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"></div>
         <div class="p-6 text-gray-900">
            <livewire:permission-edit :permission_id="$permission_id" />
         </div>
      </div>
   </div>
   </div>
</x-app-layout>
