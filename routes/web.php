<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


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

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/events/search/{search}', [EventController::class, 'search'])->name('events.search');
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('events.create');
Route::post('/events/create', [EventController::class, 'store'])->name('events.store');
Route::get('/events/show/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
