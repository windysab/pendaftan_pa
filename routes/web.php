<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GugatanController;
use Illuminate\Http\Request;

Route::redirect('/', '/dashboard-general-dashboard');

// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
})->middleware('auth');

// Auth routes handled by Fortify
Route::view('/auth-login', 'auth.auth-login')->name('login');
Route::view('/auth-register', 'auth.auth-register')->name('register');
Route::view('/password/reset', 'auth.auth-forgot-password')->name('password.request');
Route::view('/password/reset/{token}', 'auth.auth-reset-password')->name('password.reset');

// Fortify routes for authentication
Route::post('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/register', [\Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store'])->name('register.post');
Route::post('/forgot-password', [\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'store']);
Route::post('/reset-password', [\Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'store']);

// Form Gugatan
Route::get('/gugatan-form', function () {
    return view('pages.gugatan-form', ['type_menu' => 'gugatan']);
})->name('gugatan.form');

Route::post('/gugatan-page2', function (Request $request) {
    return view('pages.gugatan-page2', ['type_menu' => 'gugatan']);
})->name('gugatan.page2');

Route::get('/gugatan-page3', function () {
    return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
})->name('gugatan.page3.get');

Route::post('/gugatan-page3', function (Request $request) {
    return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
})->name('gugatan.page3');

Route::post('/gugatan/store', [GugatanController::class, 'store'])->name('gugatan.store');

Route::get('/gugatan-sukses', function (Request $request) {
    $gugatan = $request->input('gugatan'); // Example of getting it from the request
    return view('pages.gugatan-sukses', ['type_menu' => 'gugatan', 'gugatan' => $gugatan]);
})->name('gugatan.success');

Route::get('/gugatan/{id}/generate-word', [GugatanController::class, 'generateWordDocument'])->name('gugatan.generateWord');

// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});

// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// google maps
// belum tersedia

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
