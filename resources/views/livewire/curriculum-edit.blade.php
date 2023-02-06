<div class="p-6">
   <form wire:submit.prevent="curriculumUpdate">
      <div class="mb-6">
         @include('components.form-field', [
             'name' => 'name',
             'label' => 'Name',
             'type' => 'text',
             'placeholder' => 'Enter name',
             'required' => 'required',
         ])
      </div>

      <div class="flex-1 mb-6">
         <label for="day" class="lms-label">Day</label>
         <select wire:model.lazy="selectedDay" id="day" class="lms-input">
            <option value="">Select Day</option>
            @foreach ($days as $day)
               <option wire:select="$day == $selectedDay" value="{{ $day }}">{{ $day }}
               </option>
            @endforeach
         </select>

         @error('selectedDay')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
         @enderror
      </div>


      <div class="mb-6">
         @include('components.form-field', [
             'name' => 'class_time',
             'label' => 'Class Time',
             'type' => 'time',
             'placeholder' => 'Enter Time',
             'required' => 'required',
         ])
      </div>

      <div class="mb-6">
         @include('components.form-field', [
             'name' => 'class_date',
             'label' => 'Class date',
             'type' => 'date',
             'placeholder' => 'Enter Class date',
             'required' => 'required',
         ])
      </div>

      @include('components.wire-loading-btn')
   </form>
</div>
