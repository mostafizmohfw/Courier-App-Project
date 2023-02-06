<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quiz Details') }}
            </h2>

            <a class="lms-btn flex items-center gap-2" href="{{ route('quiz.index') }}">
                @include('components.icons.back') Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:quiz-show :quiz="$quiz" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
