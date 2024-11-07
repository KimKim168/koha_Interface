@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Pages')" class="p-4" />

        @livewire('page-table-data')
    </div>
@endsection
