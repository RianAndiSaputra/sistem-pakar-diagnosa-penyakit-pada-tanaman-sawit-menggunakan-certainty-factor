<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HasilDiagnosaController;


// Route untuk homepage
Route::get('/', function () {
    return view('landing'); // Menampilkan halaman landing
});
// Route::get('/diagnosa', function () {
//     return view('diagnosa'); // Pastikan file diagnosa.blade.php ada di folder views
// })->name('diagnosa');

// Halaman diagnosa
// Route untuk menampilkan formulir diagnosa
// Rute pertama
// web.php

// Route untuk menampilkan halaman diagnosa (GET)
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');

// Route untuk menangani pengiriman data dari form diagnosa (POST)
Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
//  route::get('/hai', function () {
//     return view('diagnosa.gejala'); // Menampilkan halaman landing
//  });

Route::get('hasil-diagnosa', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil-diagnosa');

// Rute untuk memproses diagnosa (POST)
Route::post('/hasil-diagnosa', [DiagnosaController::class, 'hasilDiagnosa'])->name('hasil-diagnosa.process');
// Route::get('/diagnosa', [HasilDiagnosaController::class, 'diagnosa'])->name('diagnosa');
Route::get('/hasil-diagnosa', [HasilDiagnosaController::class, 'showHasilDiagnosa'])->name('hasil-diagnosa');



// Rute registrasi pengguna
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute login

// Rute untuk login

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Grup rute admin yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::group(['middleware' => 'auth'], function () {
    //     Route::get('/dashboard', function () {
    //         return view('dashboard');
    //     });
    // });
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        // Rute untuk manajemen gejala
        Route::resource('gejala', GejalaController::class);
        Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
            Route::resource('penyakit', PenyakitController::class);
        });

        // Rute untuk manajemen penyakit
        Route::get('penyakit', [AdminController::class, 'penyakitIndex'])->name('penyakit.index');
        Route::post('penyakit', [AdminController::class, 'penyakitStore'])->name('penyakit.store');
        Route::delete('penyakit/{id}', [AdminController::class, 'penyakitDelete'])->name('penyakit.destroy');


        // Rute untuk manajemen rules
        Route::middleware('auth')->group(function () {
            // Menampilkan halaman Kelola Rules
            Route::get('rules', [AdminController::class, 'rulesIndex'])->name('rules.index'); // Menampilkan halaman rules
            Route::post('rules', [AdminController::class, 'rulesStore'])->name('rules.store'); // Menyimpan rule baru
            Route::get('rules/{id}/edit', [AdminController::class, 'rulesEdit'])->name('admin.rules.edit'); // Menampilkan halaman edit
            Route::delete('rules/{id}', [AdminController::class, 'rulesDelete'])->name('rules.destroy'); // Menghapus rule
        });
    });
});
