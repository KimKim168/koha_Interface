@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Tips')" />

        @livewire('news-table-data')

    </div>
@endsection
