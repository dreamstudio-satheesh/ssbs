<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
    HomeController,
    BlogController,
    ProductController,
    ServiceController,
    ProjectController,
    PhotoGalleryController,
    AwardController,
    CategoryController,
    ContactController,
    TestimonialController,
    SliderController,
    SeoSettingController,
    EnquiryController,
    SteelRateController
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');






// Admin Dashboard (Home)
Route::middleware('auth')->get('/', [HomeController::class, 'index'])->name('dashboard');

// Admin Protected Routes (Require Auth)
Route::middleware('auth')->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('galleries', PhotoGalleryController::class);
    Route::resource('awards', AwardController::class);
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('seo-settings', SeoSettingController::class)->only(['index', 'update']);
    Route::resource('enquiries', EnquiryController::class)->only(['index', 'show', 'destroy']);
    Route::resource('steel-rates', SteelRateController::class);
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
