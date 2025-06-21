<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\{
    ProductController as ApiProductController,
    CategoryController as ApiCategoryController,
    SliderController as ApiSliderController,
    ServiceController as ApiServiceController,
    ProjectController as ApiProjectController,
    GalleryController as ApiGalleryController,
    AwardController as ApiAwardController,
    ContactController as ApiContactController
};

// API Routes (public or authenticated if needed)

// Public API routes for Products, Services, Projects, etc.

Route::get('categories', [ApiCategoryController::class, 'index']);


Route::get('/sliders', [ApiSliderController::class, 'index']);

Route::get('/blogs', [BlogApiController::class, 'index']);
Route::get('/blogs/{slug}', [BlogApiController::class, 'show']);

Route::get('products', [ApiProductController::class, 'index']);
Route::get('products/{id}', [ApiProductController::class, 'show']);

Route::get('services', [ApiServiceController::class, 'index']);
Route::get('services/{id}', [ApiServiceController::class, 'show']);

Route::get('projects', [ApiProjectController::class, 'index']);
Route::get('projects/{id}', [ApiProjectController::class, 'show']);

Route::get('galleries', [ApiGalleryController::class, 'index']);
Route::get('galleries/{id}', [ApiGalleryController::class, 'show']);

Route::get('awards', [ApiAwardController::class, 'index']);
Route::get('awards/{id}', [ApiAwardController::class, 'show']);

Route::get('contacts', [ApiContactController::class, 'index']);
Route::get('contacts/{id}', [ApiContactController::class, 'show']);
    
    // Optionally, you can add POST routes for creating records if needed.
    // Example for adding products:
    // Route::post('products', [ApiProductController::class, 'store'])->middleware('auth:api');
