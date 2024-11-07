@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Student')" class="p-4" />

        @livewire('student-create')

    </div>
@endsection
