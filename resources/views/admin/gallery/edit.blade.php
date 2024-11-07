@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Edit Gallery')" class="p-4" />

        @livewire('gallery-edit', [
            'id' => $id
        ])

    </div>
@endsection
