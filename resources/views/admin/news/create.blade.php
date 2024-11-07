@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create News')" class="p-4" />

        @livewire('news-create')

    </div>
@endsection
