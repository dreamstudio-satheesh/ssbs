<?php

// app/Http/Controllers/Admin/PhotoGalleryController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use App\Http\Requests\PhotoGalleryRequest;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photos = PhotoGallery::all();
        return view('admin.photo_gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photo_gallery.create');
    }

    public function store(PhotoGalleryRequest $request)
    {
        PhotoGallery::create($request->validated());
        return redirect()->route('admin.photo_gallery.index');
    }

    public function edit(PhotoGallery $photoGallery)
    {
        return view('admin.photo_gallery.edit', compact('photoGallery'));
    }

    public function update(PhotoGalleryRequest $request, PhotoGallery $photoGallery)
    {
        $photoGallery->update($request->validated());
        return redirect()->route('admin.photo_gallery.index');
    }

    public function destroy(PhotoGallery $photoGallery)
    {
        $photoGallery->delete();
        return redirect()->route('admin.photo_gallery.index');
    }
}
