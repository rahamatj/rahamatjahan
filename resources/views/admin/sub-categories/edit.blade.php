@extends('admin.layout.admin')

@section('content')
    <div class="container mt-5">
        <h1>Edit Sub-category</h1>
        <form action="{{ route('sub-categories.update', $subCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            @php
                $categories = \App\Models\Category::all();
            @endphp
            <div class="mb-3">
                <label for="name" class="form-label">Sub-category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subCategory->name }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection