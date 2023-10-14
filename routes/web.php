<?php

use App\Livewire\App\Auth\LoginComponent;
use App\Livewire\App\Bings\BingComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\IndexComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', IndexComponent::class)->name('app.index');
Route::get('/home', HomeComponent::class)->name('app.home');

// Bings routes
Route::get('/bings', BingComponent::class)->name('app.bings');

//Call Route Files
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
