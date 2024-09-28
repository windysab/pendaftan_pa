<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GugatanController;

Route::redirect('/', '/dashboard-general-dashboard');

// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});

// Form Gugatan
Route::get('/gugatan-form', function () {
    return view('pages.gugatan-form', ['type_menu' => 'gugatan']);
})->name('gugatan.form');

Route::post('/gugatan-page2', function (Request $request) {
    // Simpan data dari halaman pertama ke session
    $request->session()->put('gugatan_form', $request->all());
    return view('pages.gugatan-page2', ['type_menu' => 'gugatan']);
})->name('gugatan.page2');

Route::get('/gugatan-page3', function () {
    return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
})->name('gugatan.page3.get');

Route::post('/gugatan-page3', function (Request $request) {
    // Simpan data dari halaman kedua ke session
    $request->session()->put('gugatan_page2', $request->all());
    return view('pages.gugatan-page3', ['type_menu' => 'gugatan']);
})->name('gugatan.page3');

Route::post('/gugatan/store', [GugatanController::class, 'store'])->name('gugatan.store');

Route::get('/gugatan-sukses', function () {
    $gugatan = session('gugatan');
    if (!$gugatan) {
        return redirect()->route('gugatan.form')->withErrors(['msg' => 'Data tidak ditemukan.']);
    }
    return view('pages.gugatan-sukses', ['type_menu' => 'gugatan', 'gugatan' => $gugatan]);
})->name('gugatan.success');

// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});
