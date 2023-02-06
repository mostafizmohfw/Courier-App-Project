<form wire:submit.prevent="formSubmit">
   <div class="mb-6">
      <label for="name" class="lms-label">Name</label>
      <input wire:model="name" type="text" class="lms-input">
      @error('name')
         <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
      @enderror
   </div>

   @foreach ($answers as $answer)
      <div class="mb-4">
         @include('components.form-field', [
             'name' => 'answer_' . $answer,
             'wire:model' => 'answer_' . $answer,
             'label' => 'Option ' . ucfirst($answer),
             'type' => 'text',
             'placeholder' => 'Type answer ' . ucfirst($answer),
             'required' => 'required',
         ])
      </div>
   @endforeach

   <div class="mb-4">
      <label class="lms-label" for="correct_answer">Correct answer</label>
      <select class="lms-input" wire:model.prevent="correct_answer" id="correct_answer">
         @foreach ($answers as $answer)
            <option wire:select="$answer == $correct_answer" value="{{ $answer }}">{{ ucfirst($answer) }}
            </option>
         @endforeach
      </select>
   </div>

   @include('components.form-submit-btn', [
       'target' => 'submitForm',
       'class' => 'lms-btn',
       'buttonText' => 'Update',
   ])

   {{-- @include('components.wire-loading-btn') --}}
</form>
