<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PhotoGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PhotoGalleryRequest;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $galleries = PhotoGallery::with('category')->paginate(6);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        $categories = Category::all(); // Load categories
        return view('galleries.create', compact('categories'));
    }

    public function store(PhotoGalleryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('galleries', 'public');
        }

        PhotoGallery::create($data);

        return redirect()->route('galleries.index')->with('success', 'Photo added successfully.');
    }

    public function edit(PhotoGallery $gallery)
    {
        $categories = Category::all();
        return view('galleries.edit', compact('gallery', 'categories'));
    }

    public function update(PhotoGalleryRequest $request, PhotoGallery $gallery)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($gallery->photo_path);
            $data['photo_path'] = $request->file('photo')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(PhotoGallery $gallery)
    {
        Storage::disk('public')->delete($gallery->photo_path);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Photo deleted successfully.');
    }
}