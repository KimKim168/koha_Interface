@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Edit Card')" class="p-4" />

        @livewire('card-edit', [
            'id' => $id
        ])

    </div>
@endsection
