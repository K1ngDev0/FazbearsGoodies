@extends('layouts.base')

@section('content')
    <h1>Categories</h1>

    @if ($categories->isEmpty())
        <p>No categories available.</p>
    @else
        <div class="categories-grid">
            @foreach ($categories as $category)
                <div class="category-card">
                    <a href="{{ route('categories.products', $category->id) }}">
                        <h2>{{ $category->name }}</h2>
                        <p>{{ $category->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection

<style>
    h1 {
        text-align: center;
        font-size: 2rem;
        padding: 2rem;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        padding: 1rem;
    }

    .category-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1rem;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .category-card a {
        color: inherit;
        text-decoration: none;
    }

    .category-card h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .category-card p {
        font-size: 1rem;
        color: #666;
    }
</style>
