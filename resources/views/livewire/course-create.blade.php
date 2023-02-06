<form wire:submit.prevent="formSubmit">
   <div class="flex space-x-8">
      <div class="mb-6 w-1/3">
         @include('components.form-field', [
             'name' => 'name',
             'label' => 'Name',
             'type' => 'text',
             'placeholder' => 'Enter name',
             'required' => 'required',
         ])
      </div>

      <div class="mb-6 w-1/3">
         @include('components.form-field', [
             'name' => 'image',
             'label' => 'image',
             'type' => 'file',
             'placeholder' => 'Select Image',
             'required' => '',
         ])
      </div>

      <div class="mb-6 w-1/3">
         @include('components.form-field', [
             'name' => 'price',
             'label' => 'Price',
             'type' => 'number',
             'placeholder' => 'Add price',
             'required' => 'required',
         ])
      </div>
   </div>

   <div class="flex">
      <div class="mb-6 w-full">
         @include('components.form-field', [
             'name' => 'description',
             'label' => 'Description',
             'type' => 'textarea',
             'placeholder' => 'Enter Description',
             'required' => 'required',
             'cols' => '2',
             'rows' => '6',
         ])
      </div>
   </div>

   <hr class="my-4">
   <div class="flex mb-6">
      <div class="w-full mr-4">
         <label class="lms-label" for="days">Days</label>
         <div class="flex flex-wrap -mx-4">
            @foreach ($days as $day)
               <div class="min-w-max flex items-center px-4">
                  <input wire:model="selectedDays" class="mr-2" type="checkbox" value="{{ $day }}"
                     id="checked-checkbox"> <label for="{{ $day }}">{{ ucfirst($day) }}</label>
               </div>
            @endforeach
         </div>
      </div>
      <div class="min-w-max mr-4">
         <div class="mb-6">
            @include('components.form-field', [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' => 'Enter time',
                'required' => 'required',
            ])
         </div>
      </div>

      <div class="min-w-max">
         <div class="mb-6">
            @include('components.form-field', [
                'name' => 'end_date',
                'label' => 'End date',
                'type' => 'date',
                'placeholder' => 'Enter end date',
                'required' => 'required',
            ])
         </div>
      </div>
   </div>
   <hr class="my-4">
   <div class="flex mb-6 items-center">
      <div class="w-full mr-4">
         <label class="lms-label" for="days">Teacher</label>
         <div class="flex flex-wrap -mx-4">
            @foreach ($teachers as $teacher)
               <div class="min-w-max flex items-center px-4">
                  <input id="checked-checkbox" wire:model="selectedTeachers" class="mr-2" type="checkbox"
                     value="{{ $teacher->id }}" id="{{ $teacher->id }}">
                  <label for="checked-checkbox">{{ ucfirst($teacher->name) }}</label>
               </div>
            @endforeach
         </div>
         @error('selectedTeachers')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
         @enderror
      </div>
   </div>

   {{-- @include('components.wire-loading-btn') --}}

   @include('components.form-submit-btn', [
       'target' => 'courseCreate',
       'class' => 'lms-btn',
       'buttonText' => 'Create',
   ])
</form>
