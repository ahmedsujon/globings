<?php

use App\Http\Controllers\payment\StripePaymentController;
use App\Livewire\App\Auth\LoginComponent;
use App\Livewire\App\Bings\BingComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\IndexComponent;
use App\Livewire\App\Package\PackagePlanComponent;
use App\Livewire\App\Pages\TermsConditionComponent;
use App\Livewire\App\Payment\StripePaymentComponent;
use App\Livewire\App\Payment\StripePaymentSuccessComponent;
use App\Livewire\App\Profile\ProfileComponent;
use App\Livewire\App\Profile\RecentPhotosComponent;
use App\Livewire\App\Profile\RecentPostComponent;
use App\Livewire\App\Profile\UserProfileComponent;
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

// Route::get('/', IndexComponent::class)->name('app.index');
Route::get('/', HomeComponent::class)->name('app.home');

// Profile routes
Route::get('/user-profile/{id}', UserProfileComponent::class)->name('app.userProfile');

// Bings routes
Route::get('/bings', BingComponent::class)->name('app.bings');

// Terms-and-conditions routes
Route::get('/terms-and-conditions', TermsConditionComponent::class)->name('app.terms-and-conditions');


Route::middleware('auth')->group(function(){
    Route::get('/plans', PackagePlanComponent::class)->name('app.plans');
    Route::get('/plans/payment/stripe/{subscription_id}', StripePaymentComponent::class)->name('app.planPaymentViaStripe');
    Route::post('/plans/payment/stripe/pay', [StripePaymentController::class, 'makePayment'])->name('app.payWithStripe');
    Route::get('/stripe-payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('app.stripePaymentSuccess');
    Route::get('/stripe-payment-success-component', StripePaymentSuccessComponent::class)->name('app.stripeSuccessComponent');

    Route::get('/profile', ProfileComponent::class)->name('app.profile');
    Route::get('/recent-posts', RecentPostComponent::class)->name('app.recent-posts');
    Route::get('/recent-photos', RecentPhotosComponent::class)->name('app.recent-photos');
});


//Call Route Files
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
