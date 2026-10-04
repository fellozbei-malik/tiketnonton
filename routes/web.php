<?php

use App\Http\Controllers\Admin\TicketsByEventExportController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\MyTicketController;
use App\Http\Controllers\PartnerRequestController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

// Language switcher route
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Public Route
Route::get("/", [HomeController::class, "index"])->name('home');
Route::get("/blog", [BlogController::class, "index"])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.detail');
Route::get("/event", [EventController::class, "index"])->name('event');
Route::get('/event/{event:slug}', [EventController::class, 'show'])->name('event.detail');
Route::get('/event/{event:slug}/tickets', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/terms-and-conditions', function () {
    return view('pages.terms');
})->name('terms');
Route::get('/entertainment-services', function () {
    return view('pages.services');
})->name('services');
Route::get('/joint-partner', function () {
    return view('pages.joint-partner');
})->name('joint-partner');
Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');
Route::get('/help-center', function () {
    return view('pages.help-center');
})->name('help-center');
Route::post('/help-center', [HelpCenterController::class, 'store'])->name('help-center.store');
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
})->name('privacy');
Route::get('/cookies-policy', function () {
    return view('pages.cookies');
})->name('cookies');

// Partner Request
Route::post('/joint-partner', [PartnerRequestController::class, 'store'])->name('joint-partner.store');


Route::middleware('auth')->group(function () {
    Route::get("/myorder", [MyOrderController::class, "index"])->name('myorder');
    Route::get("/myticket", [MyTicketController::class, "index"])->name('myticket');
    Route::get('/myticket/{orderItem}', [MyTicketController::class, 'show'])->name('myticket.detail');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::get('/checkout/pay/{order}', [CheckoutController::class, 'showPay'])->name('checkout.pay.show');
    Route::post('/checkout/pay/{order}/upload-proof', [CheckoutController::class, 'uploadPaymentProof'])->name('checkout.pay.upload-proof');
    Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');

    Route::get('/payment-success/{order:transaction_code}', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-failed', [CheckoutController::class, 'paymentFailed'])->name('payment.failed');
    Route::get('/myticket/{orderItem}/download', [MyTicketController::class, 'download'])->name('myticket.download');
});

// Admin export (auth required; use from Filament panel)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('tickets-by-event/export', TicketsByEventExportController::class)->name('admin.tickets-by-event.export');
});

// Auth Route
Route::get("/login", [AuthController::class, 'login'])->name("login");
Route::get("/register", [AuthController::class, 'register'])->name("register");
Route::get("/logout", [AuthController::class, 'logout'])->name("logout");
Route::post("/authenticate", [AuthController::class, "authenticate"])->name("loginAccount");
Route::post("/createAccount", [AuthController::class, "createAccount"])->name("createAccount");

use App\Http\Controllers\auth\FirebaseAuthController;
Route::post('/auth/firebase/callback', [FirebaseAuthController::class, 'callback'])->name('firebase.callback');
