<div>
    <div>
        <table class="w-full table-auto">
            <tr class="bg-gray-200 rounded-t">
                <th class="text-left border px-4 py-1">Sl:</th>
                <th class="text-left border px-4 py-1">Name:</th>
                <th class="text-left border px-4 py-1">Email:</th>
                <th class="text-left border px-4 py-1">Roles:</th>
                <th class="text-center border px-4 py-1">Registered:</th>
                <th class="text-center border px-4 py-1">Actions:</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td class="text-left border px-4 py-1">{{ $i++ }}</td>
                    <td class="text-left border px-4 py-1">{{ $user->name }}</td>
                    <td class="text-left border px-4 py-1">{{ $user->email }}</td>
                    <td class="text-left border px-4 py-1">
                        @foreach ($user->roles as $role)
                            <span class="bg-slate-700 text-white p-1 mb-1 rounded">
                                {{ $role->name }}
                            </span> &nbsp;
                        @endforeach
                    </td>
                    <td class="text-center border px-4 py-1">{{ date('F, j, Y', strtotime($user->created_at)) }}</td>
                    <td class="border px-4 py-1">
                        <div class="flex justify-center text-center items-center space-x-2">
                            <a class="bg-green-600 text-white p-1 rounded" href="{{ route('users.edit', $user->id) }}">
                                @include('components.icons.edit')
                            </a>
                            <a class="bg-yellow-600 text-white p-1 rounded"href="{{ route('users.show', $user->id) }}">
                                @include('components.icons.eye')
                            </a>
                            <form onsubmit="return confirm('Are you sure?');"
                                wire:submit.prevent="userDelete({{ $user->id }})"
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
            {{ $users->links() }}
        </div>
    </div>

</div>
