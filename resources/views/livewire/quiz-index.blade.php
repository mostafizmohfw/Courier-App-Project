<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-200 rounded-t">
            <th class="text-left border px-4 py-1">Sl:</th>
            <th class="text-left border px-4 py-1">Quiz Name</th>
            <th class="text-left border px-4 py-1">Total Questions</th>
            <th class="text-center border px-4 py-1">Actions:</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($quizs as $quiz)
            <tr>
                <td class="text-left border px-4 py-1">{{ $i++ }}</td>
                <td class="text-left border px-4 py-1">{{ $quiz->name }}</td>
                <td class="text-left border px-4 py-1">{{ count($quiz->questions) }}</td>
                <td class="border px-4 py-1">
                    <div class="flex justify-center text-center items-center space-x-2">
                        <a class="bg-orange-600 text-white p-1 rounded" href="{{ route('quiz-show', $quiz->id) }}">
                            @include('components.icons.eye')
                        </a>
                        {{-- <a class="bg-orange-600 text-white p-1 rounded" href="{{ route('quiz.show', $quiz->id) }}">
                            @include('components.icons.eye')
                        </a> --}}
                        <a class="bg-green-600 text-white p-1 rounded" href="{{ route('quiz.edit', $quiz->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="quizDelete({{ $quiz->id }})"
                            class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

    </table>

    <div class="mt-4">
        {{ $quizs->links() }}
    </div>
</div>
