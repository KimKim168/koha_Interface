@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Card')" class="p-4" />

        @livewire('card-create')

    </div>
@endsection
