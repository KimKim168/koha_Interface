@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Create Article')" class="p-4" />

        @livewire('article-create')

    </div>
@endsection
