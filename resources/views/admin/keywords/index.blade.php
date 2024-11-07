@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('messages.keyword')" />
        @livewire('keyword-table-data')
    </div>
@endsection
