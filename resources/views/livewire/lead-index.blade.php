<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-200 rounded-t">
            <th class="text-left border px-4 py-1">Name:</th>
            <th class="text-left border px-4 py-1">Email:</th>
            <th class="text-left border px-4 py-1">Phone:</th>
            <th class="text-center border px-4 py-1">Registered:</th>
            <th class="text-center border px-4 py-1">Actions:</th>
        </tr>
        @foreach ($leads as $lead)
        <tr>
            <td class="text-left border px-4 py-1">{{ $lead->name }}</td>
            <td class="text-left border px-4 py-1">{{ $lead->email }}</td>
            <td class="text-left border px-4 py-1">{{ $lead->phone }}</td>
            <td class="text-center border px-4 py-1">{{ date('F, j, Y', strtotime($lead->created_at)) }}</td>
            <td class="border px-4 py-1">
                <div class="flex justify-center text-center items-center space-x-2">
                    <a class="bg-green-600 text-white p-1 rounded" href="{{ route('leads.edit', $lead->id) }}">
                        @include('components.icons.edit')
                    </a>
                    <a class="bg-yellow-600 text-white p-1 rounded"href="{{ route('leads.show', $lead->id) }}">
                        @include('components.icons.eye')
                    </a>
                    <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="leadDelete({{$lead->id}})" class="bg-red-600 text-white p-1 w-7 h-7 rounded">
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
        {{$leads->links()}}
    </div>
</div>
