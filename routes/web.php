<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::prefix('blog')->group(function () {
    Route::apiResource('/category', \App\Http\Controllers\CategoryController::class);
    Route::apiResource('/post', \App\Http\Controllers\PostController::class);
});

Route::get('/test', function () {
    $user = \App\Models\User::where('id', 1)->firstOrFail();
    dd(
        $user->last_login_ip,
        $user->posts,
    );
});
