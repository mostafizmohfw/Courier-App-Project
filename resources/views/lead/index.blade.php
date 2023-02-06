<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lead Lists') }}
            </h2>
            <a title="Add New" class="bg-green-600 text-white p-1 rounded mb-2" href="{{ route('leads.create') }}">
                @include('components.icons.add')
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:lead-index />
                    {{-- @livewire('lead-index') --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
