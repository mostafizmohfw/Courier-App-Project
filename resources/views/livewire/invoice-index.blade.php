<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['total'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['paid'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['due'] }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <div class="flex justify-center text-center items-center space-x-2">
                            <a class="bg-green-600 text-white p-1 rounded" href="#">
                                @include('components.icons.edit')
                            </a>
                            <a
                                class="bg-yellow-600 text-white p-1 rounded"href="{{ route('invoice.show', $invoice->id) }}">
                                @include('components.icons.eye')
                            </a>
                            <form onsubmit="return confirm('Are you sure?');"
                                wire:submit.prevent="userDelete({{ $invoice->id }})"
                                class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                                <button type="submit">
                                    @include('components.icons.delete')
                                </button>
                            </form>
                        </div>
                    </div>
                </td>

            </tr>
        @endforeach
    </table>
</div>
