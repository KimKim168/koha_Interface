<div class="flex justify-center items-center min-h-screen">
    <form wire:submit.prevent="submitForm" class="bg-gray-900 p-8 rounded-lg shadow-md w-full max-w-lg">
        <!-- Full Name -->
        <div class="mb-6">
            <label for="fullName" class="block text-blue-400 mb-2">Full Name</label>
            <input type="text" id="fullName" wire:model="full_name" placeholder="Full Name"
                class="w-full px-4 py-2 bg-white text-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('full_name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-6">
            <label class="block text-blue-400 mb-2">Gender</label>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="gender" value="male" class="form-radio text-blue-500">
                    <span class="ml-2">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="gender" value="female" class="form-radio text-blue-500">
                    <span class="ml-2">Female</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="gender" value="na" class="form-radio text-blue-500">
                    <span class="ml-2">N/A</span>
                </label>
            </div>
            @error('gender')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="mb-6">
            <label for="phoneNumber" class="block text-blue-400 mb-2">Phone Number</label>
            <input type="text" id="phoneNumber" wire:model="phone_number" placeholder="+855 | Phone number"
                class="w-full px-4 py-2 bg-white text-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('phone_number')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Prefer Location -->
        <div class="mb-6">
            <label class="block text-blue-400 mb-2">Prefer Location</label>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="location" value="Sen Sok" class="form-radio text-blue-500">
                    <span class="ml-2">Sen Sok</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="location" value="Chroy Chongvar" class="form-radio text-blue-500">
                    <span class="ml-2">Chroy Chongvar</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="location" value="Not Decided Yet"
                        class="form-radio text-blue-500">
                    <span class="ml-2">Not Decided Yet</span>
                </label>
            </div>
            @error('location')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="px-8 py-2 bg-transparent border-2 border-blue-500 text-blue-500 rounded-full hover:bg-blue-500 hover:text-white transition">Send
                Now</button>
        </div>
    </form>

    <!-- Success Message -->
    @if ($successMessage)
        <div class="mt-6 text-center text-green-500">{{ $successMessage }}</div>
    @endif
</div>
