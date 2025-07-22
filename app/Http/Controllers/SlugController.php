<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SlugController extends Controller
{
    public function resolve($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            return view('category.show', ['category' => $category]);
        }

        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('products.show', ['product' => $product]);
        }

        abort(404);
    }
}
