<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with([
            'images',
            'mainImage',
            'category'
        ])->get();

        // API request için JSON döndür
        if (request()->expectsJson()) {
            return response()->json($products);
        }

        // Normal sayfa isteği için view döndür
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|unique:products,slug|max:255',
        ]);

        $product = Product::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'url' => $path,
                    'is_main' => $key === 0 // İlk resim ana resim olarak işaretlenir
                ]);
            }
        }

        if ($request->expectsJson()) {
            return response()->json($product, 201);
        }

        return redirect()->route('products.index')
            ->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['images', 'mainImage'])->findOrFail($id);

        if (request()->expectsJson()) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }

    /**
     * Display the specified resource by slug.
     */
    public function showBySlug(string $slug)
    {
        $product = Product::with(['images', 'mainImage'])->where('slug', $slug)->firstOrFail();

        if (request()->expectsJson()) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id . '|max:255',
        ]);

        $product->update($validated);

        if ($request->expectsJson()) {
            return response()->json($product);
        }

        return redirect()->route('products.index')
            ->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('products.index')
            ->with('success', 'Ürün başarıyla silindi.');
    }
}
