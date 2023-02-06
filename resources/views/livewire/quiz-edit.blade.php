<div>
    
    <div class="p-4">   
        <div class="mb-4">
             <form class="p-4" wire:submit.prevent="editQuiz">
                <div class="mb-4">
                    @include('components.form-field', [
                    'name' => 'name',
                    'wire:model'=>'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Question name',
                    'required' => 'required',
                    ])
                </div>
                <button type="submit" class="lms-btn">Update</button>
            </form>
        </div>
        <h3 class="my-4 text-gray-600 text-lg ml-3">Question List</h3>
        <div class="table w-full p-2">
            @php
                $i=1;
            @endphp
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer font-bold text-left">
                            No.
                        </th>
                        <th class="p-2 border-r cursor-pointer font-bold text-left">
                            Name
                        </th>
                        <th class="p-2 border-r cursor-pointer font-bold text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quiz->questions as $question)
                    <tr class="bg-gray-100 text-left border-b text-sm text-gray-600">
                        <td class="p-2 border-r text-left px-4">{{$i++}}</td>
                        <td class="p-2 border-r text-left px-4">{{$question->name}}</td>
                        <td class="flex items-center justify-center">
                            <form wire:submit.prevent="removeQuiz({{$question->id}})"
                                class="p-1">
                                <button onclick="return confirm('Are you Sure')" type="submit" class="lms-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- list -->

    @if (count($questions) > 0)
        <h2 class="font-bold mb-2">Add Questions to the Quiz</h2>
        <form wire:submit.prevent="addQuestion">
            <div class="mb-4">
                {{-- <label for="question_id" class="lms-label">Question</label> --}}
                <select class="lms-input" wire:model.lazy="question_id" id="question_id">
                    <option value="">Select a question</option>
                    @foreach ($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->name }}</option>
                    @endforeach
                </select>
            </div>

            @include('components.form-submit-btn', [
                'target' => 'formSubmit',
                'class' => 'lms-btn mt-4',
                'buttonText' => 'Add',
            ])
        </form>
    @else
        <div class="flex text-center w-full">
            <span class="text-orange-500 m-5 pl-8">No Question Available</span>
        </div>
    @endif
</div>
