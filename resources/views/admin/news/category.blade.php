@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('News Categories')" />
        @livewire('news-category-table-data')
    </div>
@endsection
