<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Display a list of categories
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }
}
