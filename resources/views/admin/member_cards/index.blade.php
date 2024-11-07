@extends('admin.layouts.admin')

@section('content')
    <div class="px-4">
        <x-form-header :value="__('Member Cards')" class="p-4" />

        @livewire('member-card-table-data')
    </div>
@endsection
