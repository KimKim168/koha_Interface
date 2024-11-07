@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Category')" />
        <form class="w-full" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <!-- Name Address -->
                <div>
                    <x-input-label for="name" :value="__('messages.name')" /><span class="text-red-500">*</span>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="name_kh" :value="__('messages.nameKh')" /><span class="text-red-500">*</span>
                    <x-text-input id="name_kh" class="block mt-1 w-full" type="text" name="name_kh" :value="old('name_kh')"
                        required autofocus placeholder="Name in Khmer" />
                    <x-input-error :messages="$errors->get('name_kh')" class="mt-2" />
                </div>
            </div>




            <div class="mt-10">
                <x-outline-button href="{{ URL::previous() }}">
                    {{ __('messages.goBack') }}
                </x-outline-button>
                <x-submit-button>
                    {{ __('messages.submit') }}
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
