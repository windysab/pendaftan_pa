<?php
// routes/web.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GugatanController;

// Redirect root to dashboard
Route::redirect('/', '/dashboard-general-dashboard');

// Auth Routes
Route::middleware(['throttle:100,1'])->group(function () {
    Route::get('/login', function () {
        return view('auth.auth-login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Register Route
Route::get('/register', function () {
    return view('auth.auth-register');
})->name('register');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-general-dashboard', function () {
        return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
    });

    // Gugatan
    Route::get('/gugatan', [GugatanController::class, 'index'])->name('gugatan.index');
    Route::get('/gugatan/create', [GugatanController::class, 'create'])->name('gugatan.create');
    Route::post('/gugatan', [GugatanController::class, 'store'])->name('gugatan.store');
    Route::get('/gugatan/{id}/edit', [GugatanController::class, 'edit'])->name('gugatan.edit');
    Route::put('/gugatan/{id}', [GugatanController::class, 'update'])->name('gugatan.update');
    Route::delete('/gugatan/{id}', [GugatanController::class, 'destroy'])->name('gugatan.destroy');

    Route::post('/gugatan/{id}/page2', [GugatanController::class, 'page2'])->name('gugatan.page2');
    Route::post('/gugatan/{id}/page3', [GugatanController::class, 'page3'])->name('gugatan.page3');
    Route::put('/gugatan/{id}/page3', [GugatanController::class, 'page3'])->name('gugatan.page3.update'); // Ubah nama rute ini menjadi unik

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Form Gugatan
    Route::get('/gugatan-form', function () {
        return view('pages.gugatan-form', ['type_menu' => 'gugatan']);
    })->name('gugatan.form');

    Route::post('/gugatan-page2', function (Request $request) {
        // Simpan data dari halaman pertama ke session
        $request->session()->put('gugatan_form', $request->all());
        return view('pages.gugatan-page2', ['type_menu' => 'gugatan']);
    })->name('gugatan.page2.store'); // Ubah nama rute ini menjadi unik

    Route::post('/gugatan-page3', function (Request $request) {
        // Simpan data dari halaman kedua ke session
        $request->session()->put('gugatan_page2', $request->all());
        return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
    })->name('gugatan.page3.store'); // Ubah nama rute ini menjadi unik

    Route::post('/gugatan/store', [GugatanController::class, 'store'])->name('gugatan.store.post'); // Ubah nama rute ini menjadi unik

    Route::get('/gugatan-sukses', function () {
        $gugatan = session('gugatan');
        if (!$gugatan) {
            return redirect()->route('gugatan.form')->withErrors(['msg' => 'Data tidak ditemukan.']);
        }
        return view('pages.gugatan-sukses', ['type_menu' => 'gugatan', 'gugatan' => $gugatan]);
    })->name('gugatan.success');

    Route::get('/gugatan/{id}/generate-word', [GugatanController::class, 'generateWordDocument'])->name('gugatan.generateWord');
});

// Layout
Route::view('/layout-default-layout', 'pages.layout-default-layout', ['type_menu' => 'layout']);

// Blank Page
Route::view('/blank-page', 'pages.blank-page', ['type_menu' => '']);

// Bootstrap
$bootstrapRoutes = [
    'alert',
    'badge',
    'breadcrumb',
    'buttons',
    'card',
    'carousel',
    'collapse',
    'dropdown',
    'form',
    'list-group',
    'media-object',
    'modal',
    'nav',
    'navbar',
    'pagination',
    'popover',
    'progress',
    'table',
    'tooltip',
    'typography'
];
foreach ($bootstrapRoutes as $route) {
    Route::view("/bootstrap-$route", "pages.bootstrap-$route", ['type_menu' => 'bootstrap']);
}

// Components
$componentRoutes = [
    'article',
    'avatar',
    'chat-box',
    'empty-state',
    'gallery',
    'hero',
    'multiple-upload',
    'pricing',
    'statistic',
    'tab',
    'table',
    'user',
    'wizard'
];
foreach ($componentRoutes as $route) {
    Route::view("/components-$route", "pages.components-$route", ['type_menu' => 'components']);
}

// Forms
$formRoutes = ['advanced-form', 'editor', 'validation'];
foreach ($formRoutes as $route) {
    Route::view("/forms-$route", "pages.forms-$route", ['type_menu' => 'forms']);
}

// Modules
$moduleRoutes = [
    'calendar',
    'chartjs',
    'datatables',
    'flag',
    'font-awesome',
    'ion-icons',
    'owl-carousel',
    'sparkline',
    'sweet-alert',
    'toastr',
    'vector-map',
    'weather-icon'
];
foreach ($moduleRoutes as $route) {
    Route::view("/modules-$route", "pages.modules-$route", ['type_menu' => 'modules']);
}

// Error
$errorRoutes = ['403', '404', '500', '503'];
foreach ($errorRoutes as $route) {
    Route::view("/error-$route", "pages.error-$route", ['type_menu' => 'error']);
}

// Features
$featureRoutes = ['activities', 'post-create', 'post', 'profile', 'settings', 'setting-detail', 'tickets'];
foreach ($featureRoutes as $route) {
    Route::view("/features-$route", "pages.features-$route", ['type_menu' => 'features']);
}

// Utilities
$utilityRoutes = ['contact', 'invoice', 'subscribe'];
foreach ($utilityRoutes as $route) {
    Route::view("/utilities-$route", "pages.utilities-$route", ['type_menu' => 'utilities']);
}

// Credits
Route::view('/credits', 'pages.credits', ['type_menu' => '']);
