@extends('layouts.base')

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required step="0.01">
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div>
            <label for="image">Image URL</label>
            <input type="text" id="image" name="image" value="{{ old('image', $product->image) }}">
        </div>

        <div>
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
        </div>

        <div>
            <label for="isAvailable">Available</label>
            <input type="checkbox" id="isAvailable" name="isAvailable" value="1" {{ $product->isAvailable ? 'checked' : '' }}>
        </div>

        <div>
            <button type="submit">Update Product</button>
        </div>
    </form>

    <a href="{{ route('products.index') }}">Back to Product List</a>
@endsection

<style>
    form {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input, textarea, select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }
</style>
