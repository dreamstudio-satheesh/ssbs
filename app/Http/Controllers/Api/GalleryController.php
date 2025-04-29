<?php

// app/Http/Controllers/Api/GalleryController.php
namespace App\Http\Controllers\Api;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = PhotoGallery::latest()->get();
        return response()->json(['gallery' => $photos]);
    }
}
