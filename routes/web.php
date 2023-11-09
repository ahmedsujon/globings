<?php

use App\Http\Controllers\payment\PayPalPaymentController;
use App\Http\Controllers\payment\StripePaymentController;
use App\Livewire\App\Auth\LoginComponent;
use App\Livewire\App\Bings\BingComponent;
use App\Livewire\App\Events\CreateEventComponent;
use App\Livewire\App\Events\EventDetailsComponent;
use App\Livewire\App\Events\EventsComponent;
use App\Livewire\App\Events\MyEventsComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\IndexComponent;
use App\Livewire\App\Maps\MapViewComponent;
use App\Livewire\App\Package\PackagePlanComponent;
use App\Livewire\App\Pages\TermsConditionComponent;
use App\Livewire\App\Payment\StripePaymentComponent;
use App\Livewire\App\Payment\StripePaymentSuccessComponent;
use App\Livewire\App\Profile\ProfileComponent;
use App\Livewire\App\Profile\RecentPhotosComponent;
use App\Livewire\App\Profile\RecentPostComponent;
use App\Livewire\App\Profile\UserProfileComponent;
use App\Livewire\App\Shop\ShopProfileComponent;
use App\Livewire\App\Shop\ShopsComponent;
use App\Livewire\App\Shop\ShopSettingsComponent;
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
Route::get('/shop-profile/{user_id}', ShopProfileComponent::class)->name('app.shopProfile');

// App show menu
Route::get('/shops', ShopsComponent::class)->name('app.shops');
Route::get('/map-view', MapViewComponent::class)->name('app.map.view');

// Events routes
Route::get('/events', EventsComponent::class)->name('app.events');
Route::get('/event/{id}', EventDetailsComponent::class)->name('app.event.details');


// Terms-and-conditions routes
Route::get('/terms-and-conditions', TermsConditionComponent::class)->name('app.terms-and-conditions');


Route::middleware('auth')->group(function(){
    Route::get('/plans', PackagePlanComponent::class)->name('app.plans');
    Route::get('/plans/payment/{subscription_id}', StripePaymentComponent::class)->name('app.planPayment');


    //Stripe Payment
    Route::post('/plans/payment/stripe/pay', [StripePaymentController::class, 'makePayment'])->name('app.payWithStripe');
    Route::get('/stripe-payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('app.stripePaymentSuccess');

    //Paypal Payment
    Route::post('/plans/payment/paypal/pay', [PayPalPaymentController::class, 'makePayment'])->name('app.payWithPaypal');
    Route::get('/paypal-payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('app.paypalPaymentSuccess');

    Route::get('/payment-success-component', StripePaymentSuccessComponent::class)->name('app.paymentSuccessComponent');



    // Bings routes
    Route::get('/bings', BingComponent::class)->name('app.bings');

    // Events routes
    Route::get('/my-events', MyEventsComponent::class)->name('app.my.events');
    Route::get('/create-events', CreateEventComponent::class)->name('app.events.create');


    Route::get('/profile', ProfileComponent::class)->name('app.profile');
    Route::get('/shop-settings', ShopSettingsComponent::class)->name('app.shop.settings');
    Route::get('/recent-posts', RecentPostComponent::class)->name('app.recent-posts');
    Route::get('/recent-photos', RecentPhotosComponent::class)->name('app.recent-photos');
});


//Call Route Files
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
