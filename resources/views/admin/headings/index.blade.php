@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Headings')" class="p-4" />

        @livewire('heading-table-data')
    </div>
@endsection
