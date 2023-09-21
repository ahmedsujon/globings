<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\Onboarding\OnboardingComponent;
use App\Livewire\Admin\User\AdminsComponent;
use App\Livewire\Admin\User\UsersComponent;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');

Route::get('admin', DashboardComponent::class)->middleware('auth:admin');
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function(){
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');

    // Onboarding routes
    Route::get('onboardings', OnboardingComponent::class)->name('onboardings');

    //users routes
    Route::get('users', UsersComponent::class)->name('allUsers')->middleware('adminPermission:users_manage');;
    Route::get('admins', AdminsComponent::class)->name('allAdmins')->middleware('adminPermission:admins_manage');;
});
