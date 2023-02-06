<div>

    @php
        $i=1
    @endphp
    <div class="bg-gray-200 items-center gap-4 p-4 mb-3">
        <div class="mb-2">
            <span class="py-2">Exam Name: {{ $quiz->name }}</span>
        </div>
        <div class="flex">
            <p class="flex items-center gap-1">Total: <span class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{count($quiz->questions)}}</span></p>
            <p class="flex items-center gap-1">Correct: <span class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{$count_correct_answer}}</span></p>
            <p class="flex items-center gap-1">Wrong: <span class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{$count_incorrect_answer}}</span></p>
            <p class="flex items-center gap-1"> Percentage:  <span class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{ round(($this->count_correct_answer*100)/count($quiz->questions)); }}</span></p>
        </div>
    </div>
    @foreach($quiz->questions as $question)
       <div class="border border-gray-300 mb-4 p-4  @if(array_key_exists($question->id,$correct_answers)) {{$correct_answers[$question->id] ? 'bg-green-200': 'bg-red-200'}} @endif}}">
           <h3 class=""> {{$i++}}. {{$question->name}}</h3>
           <div class="flex gap-4">
               @forEach($answerOpitons as $option)
                   <div class="flex items-center pl-4  rounded">
                       <input wire:click="answerUpdate({{$question->id}})" @if(array_key_exists($question->id,$correct_answers)) disabled @endif wire:change="result" wire:model="answer.{{$question->id}}" id="answer-{{$option}}-{{$question->id}}"  type="radio" value="{{explode('_',$option)[1]}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                       <label for="answer-{{$option}}-{{$question->id}}" class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{{$question->$option}}</label>
                   </div>
               @endforeach
           </div>
       </div>
    @endforeach
</div>

{{-- <div>

    <span class="py-2 px-3 mb-4">Exam Name: {{ $quiz->name }}</span>
    @php
        $i = 1;
    @endphp
    @foreach ($quiz->questions as $question)
        <div
            class="mb-4 border border-gray-200 p-4 @if (array_key_exists($question->id, $answered)) bg-{{ $answered[$question->id] ? 'green' : 'red' }}-100 @endif ">
            <h4 class="font-bold">{{ $i++ }}. {{ $question->name }}</h4>
            <div class="flex items-center">
                <div class="mr-2 ">
                    <input wire:model="answer" value="a,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_a-{{ $question->id }}" type="radio"
                        @if (array_key_exists($question->id, $answered)) disabled @endif>
                    <label for="answer_a-{{ $question->id }}">{{ $question->answer_a }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="b,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_b-{{ $question->id }}" type="radio"
                        @if (array_key_exists($question->id, $answered)) disabled @endif>
                    <label for="answer_b-{{ $question->id }}">{{ $question->answer_b }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="c,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_c-{{ $question->id }}" type="radio"
                        @if (array_key_exists($question->id, $answered)) disabled @endif>
                    <label for="answer_c-{{ $question->id }}">{{ $question->answer_c }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="d,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_d-{{ $question->id }}" type="radio"
                        @if (array_key_exists($question->id, $answered)) disabled @endif>
                    <label for="answer_d-{{ $question->id }}">{{ $question->answer_d }}</label>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
