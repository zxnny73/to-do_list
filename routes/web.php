<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/home', TaskController::class)->middleware('auth');
Route::get('/home/{task}/edit', [TaskController::class, 'edit'])->name('home.edit');
Route::get('/home/{task}/create', [TaskController::class, 'create'])->name('home.create');
Route::put('/home/{task}', [TaskController::class, 'update'])->name('home.update');
Route::delete('/home/{task}', [TaskController::class, 'destroy'])->name('home.destroy');
Route::post('/dashboard/{user}', [TaskController::class, 'editusertasks'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
