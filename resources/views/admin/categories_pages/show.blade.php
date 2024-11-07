{{-- resources/views/admin/categories_pages/show.blade.php --}}
@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <h1>{{ $categoryPage->title }} ({{ $categoryPage->title_kh }})</h1>
        <p><strong>Category:</strong> {{ $categoryPage->category->name }}</p>
        <p><strong>Description:</strong> {{ $categoryPage->description }}</p>
        <p><strong>Description (KH):</strong> {{ $categoryPage->description_kh }}</p>

        <a href="{{ route('admin.categories_pages.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
