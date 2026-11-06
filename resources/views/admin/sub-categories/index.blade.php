@extends('admin.layout.admin')

@section('content')
    <h1>Sub-categories</h1>

    <a href="{{ route('sub-categories.create') }}" class="btn btn-primary mb-3">Add Sub-category</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subCategories as $subCategory)
                <tr>
                    <td>{{ $subCategory->id }}</td>
                    <td>{{ $subCategory->name }}</td>
                    <td>{{ $subCategory->category->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('sub-categories.edit', $subCategory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sub-categories.destroy', $subCategory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection