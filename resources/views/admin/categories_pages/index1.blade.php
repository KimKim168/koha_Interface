{{-- resources/views/admin/categories_pages/index.blade.php --}}
@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <h1>Category Pages</h1>
        <a href="{{ route('admin.categories_pages.create') }}" class="btn btn-primary">Add New Category Page</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Title (KH)</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryPages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->title_kh }}</td>
                        <td>{{ $page->category ? $page->category->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.categories_pages.show', $page->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.categories_pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.categories_pages.destroy', $page->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
