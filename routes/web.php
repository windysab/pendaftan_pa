<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GugatanController;

// Redirect root to dashboard
Route::redirect('/', '/dashboard-general-dashboard');

// Auth Routes
Route::middleware(['throttle:100,1'])->group(function () {
    Route::view('/login', 'auth.auth-login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Register Route
Route::view('/register', 'auth.auth-register')->name('register');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::view('/dashboard-general-dashboard', 'pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);

    // Gugatan
    Route::prefix('gugatan')->name('gugatan.')->group(function () {
        Route::get('/', [GugatanController::class, 'index'])->name('index');
        Route::get('/create', [GugatanController::class, 'create'])->name('create');
        Route::post('/', [GugatanController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GugatanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GugatanController::class, 'update'])->name('update');
        Route::delete('/{id}', [GugatanController::class, 'destroy'])->name('destroy');
        Route::post('/page2', [GugatanController::class, 'page2'])->name('page2');
        Route::get('/page2', [GugatanController::class, 'page2'])->name('page2.get');
        Route::post('/page3', [GugatanController::class, 'page3'])->name('page3');
        Route::get('/page3', [GugatanController::class, 'page3'])->name('page3.get');
        Route::put('/{id}/page3', [GugatanController::class, 'updatePage3'])->name('page3.update');
        Route::put('/{id}/edit/page2', [GugatanController::class, 'updatePage2'])->name('update.page2');
        Route::put('/{id}/edit/page3', [GugatanController::class, 'updatePage3'])->name('update.page3');
        Route::get('/form', function () {
            return view('pages.gugatan-form', ['type_menu' => 'gugatan']);
        })->name('form');
        Route::post('/store2', [GugatanController::class, 'store2'])->name('store2');
        Route::post('/page2/store', function (Request $request) {
            $request->session()->put('gugatan_form', $request->all());
            return view('pages.gugatan-page2', ['type_menu' => 'gugatan']);
        })->name('page2.store');
        Route::post('/page3/store', function (Request $request) {
            $request->session()->put('gugatan_page2', $request->all());
            return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
        })->name('page3.store');
        Route::post('/store', [GugatanController::class, 'store'])->name('store.post');
        Route::get('/sukses', function () {
            $gugatan = session('gugatan');
            if (!$gugatan) {
                return redirect()->route('gugatan.form')->withErrors(['msg' => 'Data tidak ditemukan.']);
            }
            return view('pages.gugatan-sukses', ['type_menu' => 'gugatan', 'gugatan' => $gugatan]);
        })->name('success');
        Route::get('/{id}/generate-word', [GugatanController::class, 'generateWordDocument'])->name('generateWord');

        // Rute untuk halaman edit form
        Route::get('/{id}/edit/form', [GugatanController::class, 'editForm'])->name('edit.form');
        Route::post('/{id}/edit/form', [GugatanController::class, 'updateForm'])->name('update.form');

        // Rute untuk halaman edit page2
        Route::get('/{id}/edit/page2', [GugatanController::class, 'editPage2'])->name('edit.page2');
        Route::put('/{id}/edit/page2', [GugatanController::class, 'updatePage2'])->name('update.page2');

        // Rute untuk halaman edit page3
        Route::get('/{id}/edit/page3', [GugatanController::class, 'editPage3'])->name('edit.page3');
        Route::put('/{id}/edit/page3', [GugatanController::class, 'updatePage3'])->name('update.page3');
    });

    // Users
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });



    Route::get('/get-kabupaten', [GugatanController::class, 'getKabupaten'])->name('get.kabupaten');
    Route::get('/get-kecamatan', [GugatanController::class, 'getKecamatan'])->name('get.kecamatan');
    Route::get('/get-desa', [GugatanController::class, 'getDesa'])->name('get.desa');


    Route::get('/gugatan/page2', [GugatanController::class, 'page2'])->name('gugatan.page2');
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

// Credits
Route::view('/credits', 'pages.credits', ['type_menu' => '']);
