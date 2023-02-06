<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-200 rounded-t">
            <th class="text-left border px-4 py-1">Sl:</th>
            <th class="text-left border px-4 py-1">Question:</th>
            <th class="text-left border px-4 py-1">Option A:</th>
            <th class="text-left border px-4 py-1">Option B:</th>
            <th class="text-left border px-4 py-1">Option C:</th>
            <th class="text-left border px-4 py-1">Option D:</th>
            <th class="text-left border px-4 py-1">Answer</th>

            <th class="text-center border px-4 py-1">Actions:</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($questions as $question)
            <tr>
                <td class="text-left border px-4 py-1">{{ $i++ }}</td>
                <td class="text-left border px-4 py-1">{{ $question->name }}</td>
                <td class="text-left border px-4 py-1">{{ $question->answer_a }}</td>
                <td class="text-left border px-4 py-1">{{ $question->answer_b }}</td>
                <td class="text-left border px-4 py-1">{{ $question->answer_c }}</td>
                <td class="text-left border px-4 py-1">{{ $question->answer_d }}</td>
                <td class="text-left border px-4 py-1">{{ $question->correct_answer }}</td>

                <td class="border px-4 py-1">
                    <div class="flex justify-center text-center items-center space-x-2">
                        <a class="bg-orange-600 text-white p-1 rounded"
                            href="{{ route('questions.show', $question->id) }}">
                            @include('components.icons.eye')
                        </a>
                        <a class="bg-green-600 text-white p-1 rounded"
                            href="{{ route('questions.edit', $question->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="questionDelete({{ $question->id }})"
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
        {{ $questions->links() }}
    </div>
</div>
