<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VerifyCsrfToken;
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

Route::get('/', [FrontEndController::class, 'home'])->name('home');
Route::get('/press-release', [FrontEndController::class, 'press_release'])->name('press-release');
Route::get('/verify-instagram', [FrontEndController::class, 'verify_instagram'])->name('verify-instagram');
Route::get('/content-placement', [FrontEndController::class, 'content_placement'])->name('content-placement');
Route::get('/backlink-media', [FrontEndController::class, 'backlink_media'])->name('backlink-media');
Route::get('/da-pa-optimization', [FrontEndController::class, 'web_optimization'])->name('web-optimization');
Route::get('/elementor-pro', [FrontEndController::class, 'elementor_pro'])->name('elementor-pro');

// AUTH
Route::get('/login', [AuthController::class, 'login_page'])->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registration_page'])->name('registration-page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// EMAIL VERIFICATION
Route::get('/verify-email/{id}', [EmailVerificationController::class, 'view_page'])->name('verify-email-page');
Route::post('/verify-email', [EmailVerificationController::class, 'verify_email'])->name('verify-email');
Route::get('/success-verification', [EmailVerificationController::class, 'success'])->name('success-verification');

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'view_page'])->name('forgot-password-page');
Route::post('/forgot-password', [ForgotPasswordController::class, 'send_otp'])->name('forgot-password.send-otp');
Route::get('/forgot-password/{id}/change-password', [ForgotPasswordController::class, 'change_password_page'])->name('forgot-password.change-page');
Route::put('/forgot-password/change-password', [ForgotPasswordController::class, 'change_password'])->name('forgot-password.change-password');
Route::get('/forgot-password/{id}', [ForgotPasswordController::class, 'view_otp_page'])->name('forgot-password.view_otp_page');
Route::post('/verify-otp', [ForgotPasswordController::class, 'check_otp'])->name('forgot-password.check-otp');
Route::get('/success-forgot-password', [ForgotPasswordController::class, 'success'])->name('forgot-password.success');


Route::group(['middleware' => 'auth'], function () {
    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/change-password', [ProfileController::class, 'change_password'])->name('profile.change-password');
    Route::get('/change-pass-success', [ProfileController::class, 'change_password_success'])->name('profile.change-pass-success');

    // TRANSACTION
    Route::get('/invoice/{transaction}', [TransactionController::class, 'invoice'])->name('payment.invoice');
    Route::post('/create-transaction', [TransactionController::class, 'store'])->name('payment.create-transaction');
    Route::get('/cancel-transaction/{transaction}', [TransactionController::class, 'cancel_transaction'])->name('payment.cancel');
    Route::get('/payment-success/{transaction}', [TransactionController::class, 'payment_success'])->name('payment.success');
});

// TRANSACTION
Route::get('/package-services/{package}', [TransactionController::class, 'detail'])->name('payment.detail');
Route::post('/mt-notification', [TransactionController::class, 'notification'])->name('payment.mt-notification')->withoutMiddleware(VerifyCsrfToken::class);

// ADMIN
Route::get('/admin-login', [DashboardController::class, 'login_page'])->name('admin-login-page');
Route::post('/admin-login', [DashboardController::class, 'login'])->name('admin-login');
Route::get('/admin-logout', [DashboardController::class, 'logout'])->name('admin-logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class)->only(['index', 'show']);
    Route::resource('/sales', SalesController::class)->only(['index', 'show']);
});
