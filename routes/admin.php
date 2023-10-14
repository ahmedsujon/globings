<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\Accounts\AccountComponent;
use App\Livewire\Admin\Accounts\CreateAccountComponent;
use App\Livewire\Admin\Accounts\EditAccountComponent;
use App\Livewire\Admin\Accounts\ViewAccountComponent;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\Category\CategoryComponent;
use App\Livewire\Admin\Onboarding\CreateOnboardingComponent;
use App\Livewire\Admin\Onboarding\EditOnboardingComponent;
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
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');

    // Category routes
    Route::get('categories', CategoryComponent::class)->name('categories');

    // Private Account routes
    Route::get('private/accounts', AccountComponent::class)->name('private.accounts');
    Route::get('private/accounts/create', CreateAccountComponent::class)->name('private.accounts.create');
    Route::get('private/accounts/edit/{id}', EditAccountComponent::class)->name('private.accounts.edit');
    Route::get('private/accounts/view/{id}', ViewAccountComponent::class)->name('private.accounts.view');

    // Professional Account routes
    Route::get('professional/accounts', AccountComponent::class)->name('professional.accounts');
    Route::get('professional/accounts/create', CreateAccountComponent::class)->name('professional.accounts.create');
    Route::get('professional/accounts/edit/{id}', EditAccountComponent::class)->name('professional.accounts.edit');
    Route::get('professional/accounts/view/{id}', ViewAccountComponent::class)->name('professional.accounts.view');

    // Onboarding routes
    Route::get('onboardings', OnboardingComponent::class)->name('onboardings');
    Route::get('onboarding/create', CreateOnboardingComponent::class)->name('onboarding.create');
    Route::get('onboarding/edit/{id}', EditOnboardingComponent::class)->name('onboardings.edit');

    //users routes
    Route::get('users', UsersComponent::class)->name('allUsers')->middleware('adminPermission:users_manage');;
    Route::get('admins', AdminsComponent::class)->name('allAdmins')->middleware('adminPermission:admins_manage');;
});
