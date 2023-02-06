<form wire:submit.prevent="submitForm" class="mb-6">
    <div class="flex space-x-8">
        <div class="flex-1 w-1/2 mb-2">
            <label for="name" class="lms-label">Name</label>
            <input wire:model.lazy="name" type="text" class="lms-input">
            @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 w-1/2 mb-2">
            <label for="email" class="lms-label">Email</label>
            <input wire:model.lazy="email" type="text" class="lms-input">
            @error('email')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="flex space-x-8 my-4">
        <div class="flex-1 w-1/2 mb-2">
            <label for="password" class="lms-label">Password</label>
            <input wire:model.lazy="password" type="password" class="lms-input">
            @error('password')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 w-1/2 mb-2">
            <label for="role" class="lms-label">Role</label>
            <select wire:model.lazy="role" id="role" class="lms-input">
                <option value="0">Select Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @error('role')
        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')

</form>