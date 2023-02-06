<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Edit') }}
            </h2>
            <a title="Add New" class="bg-green-600 text-white py-1 px-3 rounded mb-2" href="{{ route('users.index') }}">
                back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:user-edit :user_id="$user_id" />
                    {{-- @livewire('lead-index') --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



