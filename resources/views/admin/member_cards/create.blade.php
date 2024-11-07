@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Member Card')" class="p-4" />

        @livewire('member-card-create')

    </div>
@endsection
