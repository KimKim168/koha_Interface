@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Gallery')" class="p-4" />

        @livewire('gallery-create')

    </div>
@endsection
