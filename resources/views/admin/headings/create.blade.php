@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Heading')" class="p-4" />

        @livewire('heading-create')

    </div>
@endsection
