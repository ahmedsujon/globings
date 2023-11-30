<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\Accounts\PrivateAccountComponent;
use App\Livewire\Admin\Accounts\ProfessionalAccountComponent;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\Category\CategoryComponent;
use App\Livewire\Admin\Category\SubCategoryComponent;
use App\Livewire\Admin\Onboarding\CreateOnboardingComponent;
use App\Livewire\Admin\Onboarding\EditOnboardingComponent;
use App\Livewire\Admin\Onboarding\OnboardingComponent;
use App\Livewire\Admin\Posts\PostComponent;
use App\Livewire\Admin\Shops\ShopComponent;
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

    // Sub Category routes
    Route::get('sub-categories', SubCategoryComponent::class)->name('sub.categories');

    // Private Account routes
    Route::get('accounts/private', PrivateAccountComponent::class)->name('private.accounts');
    // Professional Account routes
    Route::get('accounts/professional', ProfessionalAccountComponent::class)->name('professional.accounts');

    // Shop routes
    Route::get('shops', ShopComponent::class)->name('shops.list');

    // Posts routes
    Route::get('shop/posts', PostComponent::class)->name('shops.posts');

    // Onboarding routes
    Route::get('onboardings', OnboardingComponent::class)->name('onboardings');
    Route::get('onboarding/create', CreateOnboardingComponent::class)->name('onboarding.create');
    Route::get('onboarding/edit/{id}', EditOnboardingComponent::class)->name('onboardings.edit');

    //users routes
    Route::get('users', UsersComponent::class)->name('allUsers')->middleware('adminPermission:users_manage');;
    Route::get('admins', AdminsComponent::class)->name('allAdmins')->middleware('adminPermission:admins_manage');;
});
