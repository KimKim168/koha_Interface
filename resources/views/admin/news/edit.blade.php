@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Edit News')" class="p-4" />

        @livewire('news-edit', [
            'id' => $id
        ])

    </div>
@endsection
