@extends('admin.layouts.admin')

@section('content')
<div class="p-4">
    <x-form-header :value="__('Create User')" />
    <form class="w-full">
        <div class="grid md:grid-cols-2 md:gap-6">
            <!-- Name Address -->
            <div>
                <x-input-label for="name" :value="__('messages.name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('messages.email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6 pt-4">
            {{-- Password --}}
            <div>
                <x-input-label for="password" :value="__('messages.password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('messages.confirmPassword')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-3 md:gap-6 mt-4">
            <!-- Name Address -->
            <div>
                <x-input-label for="size" :value="__('messages.phone')" />
                <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size')" required autofocus placeholder="Size" />
                <x-input-error :messages="$errors->get('size')" class="mt-2" />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="categories" :value="__('messages.gender')" />
                <x-select-option id="categories">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </x-select-option>
            </div>
            <div>
                <x-input-label for="discount" :value="__('messages.dateOfBirth')" />
                <x-text-input id="discount" class="block mt-1 w-full" type="date" name="discount" :value="old('discount')" required autofocus placeholder="Discount" />
                <x-input-error :messages="$errors->get('discount')" class="mt-2" />
            </div>
        </div>

        <div class="mb-6">
            <div class="flex items-center space-4">
                <div class="max-w-40">
                    <img id="selected-image" src="#" alt="Selected Image" class="hidden max-w-full max-h-40 pr-4" />
                </div>
                <div class="flex-1">
                    <x-input-label for="types" :value="__('messages.uploadImage')" />
                    <x-file-input id="dropzone-file" name="image" accept="image/png, image/jpeg, image/gif" onchange="displaySelectedImage(event)" />
                </div>
            </div>
        </div>

        <div>
            <x-outline-button href="{{ URL::previous() }}">
                {{__('messages.goBack')}}
            </x-outline-button>
            <x-submit-button>
                {{__('messages.submit')}}
            </x-outline-button>
        </div>
    </form>


</div>

<script>
    function displaySelectedImage(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const imgElement = document.getElementById('selected-image');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
                imgElement.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            imgElement.src = "#";
            imgElement.classList.add('hidden');
        }
    }

</script>
@endsection
