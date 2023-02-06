<div class="container">
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input wire:model="name" type="text" class="lms-input">

                @error('name')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model="email" type="email" class="lms-input">

                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input wire:model="phone" type="tel" class="lms-input">

                @error('phone')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @include('components.wire-loading-btn')
    </form>
</div>
