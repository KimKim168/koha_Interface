@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Edit Pages')" class="p-4" />

        @livewire('page-edit', [
            'id' => $id
        ])

    </div>
@endsection
