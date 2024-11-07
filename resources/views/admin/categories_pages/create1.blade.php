{{-- resources/views/admin/categories_pages/create.blade.php --}}
@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Category Page</h1>
        <form action="{{ route('admin.categories_pages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title_kh">Title (KH)</label>
                <input type="text" name="title_kh" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="description_kh">Description (KH)</label>
                <textarea name="description_kh" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
