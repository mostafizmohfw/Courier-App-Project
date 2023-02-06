<form wire:submit.prevent="submitForm" class="mb-6">
   <div class="mb-6">
      <label for="name" class="lms-label">Name</label>
      <input wire:model="name" type="text" class="lms-input">
      @error('name')
         <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
      @enderror
   </div>
   <h2 class="font-bold mt-4">Persissions:</h2>
   <div class="flex">
      @foreach ($permissions as $permission)
         <div class="w-1/4 px-4 my-2">
            <label for="permission" class="inline-flex items-center">
               <input wire:model="selectedPermissions" type="checkbox" class="form-checkbox"
                  value="{{ $permission->id }}">
               <span class="ml-2">{{ $permission->name }}</span>
            </label>
         </div>
      @endforeach
   </div>
   @error('selectedPermissions')
      <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
   @enderror
   {{-- @include('components.wire-loading-btn') --}}
   @include('components.form-submit-btn', [
       'target' => 'updateLead',
       'class' => 'lms-btn',
       'buttonText' => 'create',
   ])
</form>
