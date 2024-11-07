@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Gallery')" class="p-4" />

        @livewire('gallery-table-data')
    </div>
@endsection
