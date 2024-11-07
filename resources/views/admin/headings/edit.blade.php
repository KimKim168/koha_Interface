@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Edit Heading')" class="p-4" />

        @livewire('heading-edit', [
            'id' => $id
        ])

    </div>
@endsection
