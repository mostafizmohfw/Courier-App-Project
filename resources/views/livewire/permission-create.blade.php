<form wire:submit.prevent="submitForm" class="mb-6">
   <div class="mb-6">
      <label for="name" class="lms-label">Name</label>
      <input wire:model="name" type="text" class="lms-input">
      @error('name')
         <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
      @enderror
   </div>

   @include('components.form-submit-btn', [
       'target' => 'updateLead',
       'class' => 'lms-btn',
       'buttonText' => 'Create',
   ])

</form>
