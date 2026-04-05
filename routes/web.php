<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DownloadResumeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeScanController;
use App\Mail\VerifyEmailMail;
use App\Mail\WelcomeUserMail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


// auth routes
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
Route::post('/signup', [HomeController::class, 'register'])->name('signup.submit');
Route::post('/login', [HomeController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


// 1️⃣ Show verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 2️⃣ Handle verification link click
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $user = $request->user();
    // 1. Guard Clause: If already verified, just redirect. 
    // This prevents sending duplicate Welcome Emails if they click the link twice.
    if ($user->hasVerifiedEmail()) {
        return redirect()->route('tools');
    }
    // 2. Mark the user as verified in the DB
    $request->fulfill();
    // 3. Award the 5 Smart Credits (Full Stack Logic)
    $user->increment('total_credits', 5);
    // 4. Send the Transactional Neon Welcome Email via ZeptoMail
    Mail::to($user->email)->send(new WelcomeUserMail($user));
    return redirect()->route('tools')
        ->with('success', 'Identity Confirmed. 5 Smart Credits have been added to your terminal.');
})->middleware(['auth', 'signed'])->name('verification.verify');

// 3️⃣ Resend verification link
Route::post('/email/verification-notification', function (Request $request) {
    $user = $request->user();

    // 1. Check if already verified
    if ($user->hasVerifiedEmail()) {
        return redirect()->intended(route('tools'))
            ->with('success', 'Your email is already verified!');
    }

    // 2. Trigger your Custom ZeptoMail Notification
    // This calls the method you modified in the User model
    $user->sendEmailVerificationNotification();

    return redirect()->route('verification.dispatched')
        ->with('success', 'SYSTEM_DISPATCH: New access key transmitted.');

})->middleware(['auth', 'throttle:3,1'])->name('verification.send');
Route::get('/email/verification-dispatched', function () {
    return view('auth.email-dispatched');
})->middleware('auth')->name('verification.dispatched');
// Show forgot password form
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Send reset link
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        return redirect()->route('password.sent')->with('email', $request->email);
    }

    // Force a single string error message
    return back()->withErrors([
        'error' => __($status)
    ]);
})->name('password.email');

// Add the landing page route
Route::get('/forgot-password/sent', function () {
    // If they refresh the page and the session is gone, send them back to forgot-password
    if (!session('email')) {
        return redirect()->route('password.request');
    }
    return view('auth.password-sent');
})->name('password.sent');

// Show reset form
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

// Handle reset
Route::post('/reset-password', function (Request $request) {

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) use ($request) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', 'Password reset successfully!')
        : back()->withErrors(['email' => __($status)]);
})->name('password.update');

Route::get('/tech-stacks', [HomeController::class, 'fetchTechStack'])->name('fetchTechStack');
Route::post('/queries', [HomeController::class, 'Queries'])->name('submitQuery')->middleware('throttle:5,1');
Route::get('/identity', [HomeController::class, 'viewResume'])->name('viewResume');
Route::get('/download-resume', [HomeController::class, 'downloadResume'])->name('download_resume');
Route::get('/tool/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::resource('blogs', BlogController::class)->names([
    'index' => 'blogs',
    'show' => 'blogs.show',
]);

Route::get('/tool/download/{id}/{s}', [ResumeController::class, 'download'])
    ->name('resume.download');

Route::get('/tools', [ResumeController::class, 'tools'])->name('tools');
Route::get('/tools/resume-builder', [ResumeController::class, 'resume_builder'])->name('tools.resume.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/resume-builder', [ResumeController::class, 'builder'])->name('tools.resume.builder');
    Route::post('/resume/preview', [ResumeController::class, 'resume_preview'])->name('resume-preview');
    Route::post('/resume/export', [ResumeController::class, 'export'])->name('resume.export');

    Route::get('/profile', [ProfileController::class, 'profile_page'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/resume/downloads', [DownloadResumeController::class, 'downloaded_resumes'])->name('downloaded.resumes');
    Route::get('/resume/view/{id}', [DownloadResumeController::class, 'view_resume'])->name('resume.view');
    Route::get('/resume/download/{id}', [ResumeController::class, 'downloadLocal'])->name('resume.download');
});



Route::post('/auth-check', [AuthController::class, 'auth_check'])->name('auth-check');

Route::middleware(['json_auth'])->group(function () {
    Route::post('/resume-builder', [ResumeController::class, 'generate'])->name('resume.builder.submit');
    Route::post('/resume/pro_summary', [ResumeController::class, 'pro_summary'])->name('resume.pro_summary');
    Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('create.order');
    Route::post('/verify-payment', [PaymentController::class, 'verifyPayment'])->name('verify.payment');
    Route::post('/password-change', [AuthController::class, 'password_change'])->name('password.change');
    Route::post('/profile/avatar/update', [ProfileController::class, 'profile_avatar_update'])->name('profile.avatar.update');
    Route::delete('/resume/delete/{id}', [ResumeController::class, 'apiDestroy'])->name('resume.delete');
    Route::post('/ai/suggest-skills', [ResumeController::class, 'ai_suggestions'])->name('suggest.skills');
    Route::post('/resume/score_check', [ResumeScanController::class, 'score_check'])->name('resume.score');

});

Route::get('/terms', [LegalController::class, 'terms'])->name('terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/refund-policy', [LegalController::class, 'refund'])->name('refund');


Route::get('/error', function () {
    return view('errors.invalid');
})->name('errors.invalid');
// Custom Error Page Route
Route::get('/system-error', function () {
    return view('errors.500');
})->name('errors.500');


Route::get('/test-email', function () {
    return view('emails.password_reset');
});