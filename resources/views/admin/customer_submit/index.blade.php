@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Customer Submit')" />
        @livewire('customer-submit-table-data')
    </div>
@endsection
