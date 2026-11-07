@extends('admin.layout.admin')

@section('content')
    <div class="container mt-5">
        <h1>Edit Product</h1>

        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>

        <form action="{{ route('products.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sub_category_id" class="form-label">Sub-category</label>
                <select class="form-control" id="sub_category_id" name="sub_category_id" required>
                    @foreach($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                    @endforeach
                </select>
                @error('sub_category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{!! $product->description !!}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="old_price" class="form-label">Old Price</label>
                <input type="number" step="0.01" class="form-control" id="old_price" name="old_price">
                @error('old_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_price" class="form-label">New Price</label>
                <input type="number" step="0.01" class="form-control" id="new_price" name="new_price">
                @error('new_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#category_id').on('change', function () {
            const id = $(this).val();    

            $.get(`/admin/categories/${id}/sub-categories`, {}, function (res) {
                res = res.map(function(c) {
                    return `<option value=${c.id}>
                        ${c.name}
                    </option>`;
                });
            
                $('#sub_category_id').html(res);
            });
        });
    </script>
@endpush