@extends('layouts.base')

@section('content')
    <h1>Product List</h1>

    @auth
        @if(Auth::user()->isAdmin)
            @if (!$isCategoryView)
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
            @endif
        @endif
    @endauth

    @if ($products->isEmpty())
        <p>No products available.</p>
    @else
        @auth
            @if(Auth::user()->isAdmin)
                @if ($isCategoryView)
                    <div class="product-grid">
                        @foreach ($products as $product)
                            <div class="product-card">
                                <h2>{{ $product->name }}</h2>
                                <p>{{ $product->description }}</p>
                                <p><strong>Price:</strong> ${{ $product->price }}</p>
                                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                <p><strong>Available:</strong> {{ $product->isAvailable ? 'Yes' : 'No' }}</p>
                                <p><strong>Category:</strong> {{ $product->category ? $product->category->name : 'N/A' }}</p>
                                <div class="image-container">
                                    @if ($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100%">
                                    @else
                                        <p>No Image</p>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Order</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <table border="1" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Available</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->isAvailable ? 'Yes' : 'No' }}</td>
                                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        @else
            <div class="product-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <p><strong>Available:</strong> {{ $product->isAvailable ? 'Yes' : 'No' }}</p>
                        <p><strong>Category:</strong> {{ $product->category ? $product->category->name : 'N/A' }}</p>
                        <div class="image-container">
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100%">
                            @else
                                <p>No Image</p>
                            @endif
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Order</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endauth
    @endif
@endsection

<style>
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 16px;
        padding: 20px;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-container {
        margin: 10px 0;
    }

    img {
        max-width: 100%;
        height: auto;
    }
</style>
