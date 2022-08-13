<?php

declare(strict_types=1);

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::controller(ProjectsController::class)
        ->group(function () {
            Route::get('projects', 'index');
            Route::get('projects/create', 'create');
            Route::post('projects', 'store');
            Route::get('projects/{project}', 'show');
        });
});

require __DIR__ . '/auth.php';
