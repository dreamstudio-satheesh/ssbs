<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'product')->get();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $photoPaths = [];
        
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('products', 'public');
            }
        }

        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'photos' => json_encode($photoPaths),
            'facilities' => $request->facilities,
            'seo_title' => $request->seo_title,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('type', 'product')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $currentPhotos = json_decode($product->photos, true) ?? [];

        // Handle new photo uploads
        if ($request->hasFile('photos')) {
            // Delete old photos
            foreach ($currentPhotos as $photo) {
                Storage::disk('public')->delete($photo);
            }
            
            // Store new photos
            $newPhotoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $newPhotoPaths[] = $photo->store('products', 'public');
            }
            $data['photos'] = json_encode($newPhotoPaths);
        } else {
            // Keep existing photos if no new ones uploaded
            $data['photos'] = $product->photos;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete all associated photos
        foreach (json_decode($product->photos, true) ?? [] as $photo) {
            Storage::disk('public')->delete($photo);
        }
        
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}