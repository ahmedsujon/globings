<?php

use App\Livewire\App\HomeComponent;
use App\Livewire\App\IndexComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\App\Auth\LoginComponent;
use App\Livewire\App\Bings\BingComponent;
use App\Livewire\App\Shop\ShopsComponent;
use App\Livewire\App\Maps\MapViewComponent;
use App\Livewire\App\Events\EventsComponent;
use App\Livewire\App\Events\MyEventsComponent;
use App\Livewire\App\Profile\ProfileComponent;
use App\Livewire\App\Shop\ShopProfileComponent;
use App\Livewire\App\Shop\FavoriteShopComponent;
use App\Livewire\App\Shop\ShopSettingsComponent;
use App\Livewire\App\Events\CreateEventComponent;
use App\Livewire\App\Pages\ShareProfileComponent;
use App\Livewire\App\Profile\RecentPostComponent;
use App\Livewire\App\Events\EventDetailsComponent;
use App\Livewire\App\Package\PackagePlanComponent;
use App\Livewire\App\Profile\UserProfileComponent;
use App\Livewire\App\Scanner\ScanSuccessComponent;
use App\Livewire\App\Pages\TermsConditionComponent;
use App\Livewire\App\Profile\RecentPhotosComponent;
use App\Http\Controllers\NotificationSendController;
use App\Livewire\App\Payment\StripePaymentComponent;
use App\Livewire\App\Scanner\ProfileScannerComponent;
use App\Http\Controllers\DependableDropdownController;
use App\Livewire\App\Pages\ReloadShareProfileComponent;
use App\Http\Controllers\payment\PayPalPaymentController;
use App\Http\Controllers\payment\StripePaymentController;
use App\Livewire\App\Auth\VerificationComponent;
use App\Livewire\App\Bings\RedeemSuccess;
use App\Livewire\App\LoyaltyCards\LoyaltyComponent;
use App\Livewire\App\Payment\StripePaymentSuccessComponent;

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
Route::get('/', HomeComponent::class)->name('app.home')->middleware(['subscribed', 'verifiedAccount']);
Route::get('/filter', HomeComponent::class)->middleware(['subscribed', 'verifiedAccount']);

// Profile routes
Route::get('/user-profile/{id}', UserProfileComponent::class)->name('app.userProfile')->middleware(['subscribed', 'verifiedAccount']);
Route::get('/shop-profile/{user_id}', ShopProfileComponent::class)->name('app.shopProfile')->middleware(['subscribed', 'verifiedAccount']);

// App show menu
Route::get('/shops', ShopsComponent::class)->name('app.shops')->middleware(['subscribed', 'verifiedAccount']);
Route::get('/shops/filter', ShopsComponent::class)->middleware(['subscribed', 'verifiedAccount']);
Route::get('/map-view', MapViewComponent::class)->name('app.map.view')->middleware(['subscribed', 'verifiedAccount']);

// Events routes
Route::get('/events', EventsComponent::class)->name('app.events')->middleware(['subscribed', 'verifiedAccount']);
Route::get('/event/{id}', EventDetailsComponent::class)->name('app.event.details')->middleware(['subscribed', 'verifiedAccount']);


// Terms-and-conditions routes
Route::get('/terms-and-conditions', TermsConditionComponent::class)->name('app.terms-and-conditions')->middleware(['subscribed', 'verifiedAccount']);

Route::get('/plans', PackagePlanComponent::class)->name('app.plans')->middleware(['auth', 'verifiedAccount']);
Route::get('/plans/payment/{subscription_id}', StripePaymentComponent::class)->name('app.planPayment')->middleware(['auth', 'verifiedAccount']);

//Stripe Payment
Route::post('/plans/payment/stripe/pay', [StripePaymentController::class, 'makePayment'])->name('app.payWithStripe')->middleware(['auth', 'verifiedAccount']);
Route::get('/stripe-payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('app.stripePaymentSuccess')->middleware(['auth', 'verifiedAccount']);

//Paypal Payment
Route::post('/plans/payment/paypal/pay', [PayPalPaymentController::class, 'makePayment'])->name('app.payWithPaypal')->middleware(['auth', 'verifiedAccount']);
Route::get('/paypal-payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('app.paypalPaymentSuccess')->middleware(['auth', 'verifiedAccount']);

Route::get('/payment-success-component', StripePaymentSuccessComponent::class)->name('app.paymentSuccessComponent')->middleware(['auth', 'verifiedAccount']);

Route::get('/account-verification', VerificationComponent::class)->name('app.accountVerification')->middleware('auth');

Route::middleware(['auth', 'subscribed', 'verifiedAccount'])->group(function () {
    // Profile share routes
    Route::get('/share-my-profile', ShareProfileComponent::class)->name('app.profile.share');
    Route::get('/share-my-profile-reload', ReloadShareProfileComponent::class)->name('app.profile.share.reload');

    // Bings routes
    Route::get('/bings', BingComponent::class)->name('app.bings');
    Route::get('/bings/redeem/success/{redeem_history_id}', RedeemSuccess::class)->name('app.bingRedeemSuccess');

    // Loyalty Cards
    Route::get('/loyalty-cards', LoyaltyComponent::class)->name('app.loyalty.cards');

    // Favorites shop routes
    Route::get('/my-favorite-shop', FavoriteShopComponent::class)->name('app.my-favorite-shop');

    // Events routes
    Route::get('/my-events', MyEventsComponent::class)->name('app.my.events');
    Route::get('/create-events', CreateEventComponent::class)->name('app.events.create');

    Route::get('/profile', ProfileComponent::class)->name('app.profile');
    Route::get('/shop-settings', ShopSettingsComponent::class)->name('app.shop.settings');
    Route::post('/shop-settings/get-sub-category', [DependableDropdownController::class, 'subCategory'])->name('getSubCategory');
    Route::post('/shop-settings/get-sub-sub-category', [DependableDropdownController::class, 'subSubCategory'])->name('getSubSubCategory');
    Route::get('/recent-posts', RecentPostComponent::class)->name('app.recent-posts');
    Route::get('/recent-photos', RecentPhotosComponent::class)->name('app.recent-photos');

    Route::get('/scanner', ProfileScannerComponent::class)->name('app.scanner');
    Route::post('/scanner/scan', [ProfileScannerComponent::class, 'scan'])->name('app.scannerScan');
    Route::get('/scanner/scan-success', ScanSuccessComponent::class)->name('app.scannerScanSuccess');

    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::get('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
});


//Call Route Files
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
