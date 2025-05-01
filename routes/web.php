<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
    SliderController,
    PageController,
    SteelRateController,
    SocialLinkController,
    TestimonialController
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

// routes/web.php

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});

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
    Route::resource('sliders', SliderController::class);
    Route::resource('pages', PageController::class);
    Route::resource('testimonials', TestimonialController::class)->only(['index', 'show', 'destroy']);
    Route::resource('steel-rates', SteelRateController::class);
    Route::resource('social-links', SocialLinkController::class);
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/symlink', function () {
    Artisan::call('storage:link');
    return '✅ Symlink created!';
});

Route::get('/migrate', function () {
    // Security check - require a secret token
    if (request('token') !== config('app.git_pull_token')) {
        abort(403, 'Unauthorized');
    }

    if (request('fresh') === 'true') {
        // Run fresh migration
        $exitCode = Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => true
        ]);
    } else {
        // Run regular migration
        $exitCode = Artisan::call('migrate', [
            '--force' => true
        ]);
       
    }

    $output = Artisan::output();

    return response()->json([
        'success' => $exitCode === 0,
        'output' => $output
    ]);
})->middleware('throttle:3,1'); // Limit to 3 requests per minute


Route::get('/pull', function () {
    // Security check - require a secret token
    if (request('token') !== config('app.git_pull_token')) {
        abort(403, 'Unauthorized');
    }

    // Optional branch parameter
    $branch = request('branch', config('app.git_branch', 'main'));

    $exitCode = Artisan::call('git:pull', [
        '--branch' => $branch
    ]);

    $output = Artisan::output();

    return response()->json([
        'success' => $exitCode === 0,
        'output' => $output
    ]);
})->middleware('throttle:3,1'); // Limit to 3 requests per minute
