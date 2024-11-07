@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Cards')" class="p-4" />

        @livewire('card-table-data')
    </div>
@endsection
