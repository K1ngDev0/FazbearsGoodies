<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Import the Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products, 'isCategoryView' => false]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'isAvailable' => 'boolean',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'isAvailable' => $request->isAvailable ?? 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'isAvailable' => 'boolean',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function indexByCategory($id)
    {
        $products = Product::where('category_id', $id)->get();
        $category = Category::findOrFail($id);

        return view('products.index', [
            'products' => $products,
            'category' => $category,
            'isCategoryView' => true
        ]);
    }
}
