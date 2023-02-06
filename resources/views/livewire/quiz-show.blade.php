<div>
    <h2 class="font-bold mb-2">Questions</h2>
    @if (count($quiz->questions) > 0)
        <ul class="mb-2 ml-10">
            @php
                $i = 1;
            @endphp
            @foreach ($quiz->questions as $question)
                <li>{{ $i++ }}. {{ $question->name }}</li>
            @endforeach
        </ul>
    @else
        <span class="py-10 ml-10">Select Question First</span>
    @endif

    <!-- list -->

    @if (count($questions) > 0)
        <h2 class="font-bold my-5">Add Question</h2>
        <form wire:submit.prevent="addQuestion">
            <div class="mb-4">
                <select class="lms-input" wire:model.lazy="question_id" id="question_id">
                    <option value="">Select a question</option>
                    @foreach ($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->name }}</option>
                    @endforeach
                </select>
            </div>

            @include('components.wire-loading-btn')
        </form>
    @else
        <div class="flex text-center w-full">
            <span class="text-orange-500 my-5 ">No Question Available</span>
        </div>
    @endif
</div>
