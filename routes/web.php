<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BenihDataController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\MonitoringDinasController;
use App\Http\Controllers\MonitoringProdusenController;
use App\Http\Controllers\PermintaanPesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;



Route::get('/', function () {
    if (Auth::check()) {
        return view('frontend.home');
    } else {
        return view('frontend.home-noauth');
    }
})->name('home');



Route::get('/tambah-benih', [BenihDataController::class, 'create'])->name('BenihData.create');

Route::post('/benih_data', [BenihDataController::class, 'store'])->name('BenihData.store');

Route::get('/benih_data/{id}', [BenihDataController::class, 'detail'])->name('BenihData.detail');
Route::get('/benih_data/{id}/show', [BenihDataController::class, 'show'])->name('BenihData.show');
Route::get('/benih_data/{id}/edit', [BenihDataController::class, 'edit'])->name('BenihData.edit');

Route::get('/pages/display', [BenihDataController::class, 'index'])->name('BenihData.display');
Route::get('/detail/{id}', [BenihDataController::class, 'detail'])->name('frontend.detail');
// Route::get('/edit/{id}', [BenihDataController::class, 'edit'])->name('frontend.edit');
Route::get('/edit/{id}', [BenihDataController::class, 'edit'])->name('frontend.edit');


Route::put('/update/{id}', [BenihDataController::class, 'update'])->name('BenihData.update');

;
Route::delete('/benih_data/{id}', [BenihDataController::class, 'destroy'])->name('BenihData.destroy');
Route::get('/frontend/display', [BenihDataController::class, 'index'])->name('frontend.display');

Route::get('/pages/display/padi', [BenihDataController::class, 'displayPadi'])->name('BenihData.displayPadi');
Route::get('/pages/display/kedelai', [BenihDataController::class, 'displayKedelai'])->name('BenihData.displayKedelai');

Route::get('/pages/display/padi/pertanian', [BenihDataController::class, 'displayPadiPertanian'])->name('BenihData.displayPadiPertanian');
Route::get('/pages/display/kedelai/pertanian', [BenihDataController::class, 'displayKedelaiPertanian'])->name('BenihData.displayKedelaiPertanian');

Route::get('/benih_data/{id}/pertanian', [BenihDataController::class, 'detailpertanian'])->name('BenihData.detailpertanian');
// Route::post('/detailpesan',[BenihDataController::class, 'detailPesanan'])->name('BenihData.detailPesanan');
// Route::post('/detailpesan', 'BenihDataController@detailPesanan')->name('detail.pesanan');

Route::post('/pesan/{id}', 'BenihDataController@pesan')->name('frontend.pesan');


// tambahan route
Route::middleware('auth')->group(function () {
    Route::get('/permintaan-pesanan', [PermintaanPesananController::class, 'index']);
    Route::get('/permintaan-pesanan/invoice/{id}', [PermintaanPesananController::class, 'invoice']);
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{id}', [PesananController::class, 'invoice'])->name('pesanan.invoice');
    Route::get('/pesanan/riwayat/{id}', [PesananController::class, 'riwayat'])->name('pesanan.riwayat');
    Route::post('/pesanan/cek-pengiriman', [PesananController::class, 'cekPengiriman'])->name('pesanan.cekPengiriman');
    Route::get('/detail-distribusi/{id}', [PermintaanPesananController::class, 'distribusi'])->name('distribusi.pesanan');
    Route::put('/pesanan/status-pengiriman', [PesananController::class, 'updateStatusPengiriman'])->name('pesanan.updateStatusPengiriman');
    Route::post('/checkout', [PesananController::class, 'store']);
    Route::get('/track-distribusi/{id}', [PermintaanPesananController::class, 'trackDistribusi'])->name('track.distribusi');
    Route::put('/update-track-distribusi/{id}', [PermintaanPesananController::class, 'updateStatusPengiriman'])->name('track.distribusi.update');

    Route::prefix('padi')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'padi');
            Route::get('/detail/{id}', 'detail');
            Route::get('/checkout/{id}/{quantity}', 'checkout');
        });
    });

    Route::prefix('kedelai')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'kedelai');
            Route::get('/detail/{id}', 'detail');
            Route::get('/checkout/{id}/{quantity}', 'checkout');
        });
    });

    Route::prefix('manage-users')->group(function () {
        Route::get('/pembeli', [ManageUserController::class, 'pembeli'])->name('pembeli.index');
        Route::get('/produsen', [ManageUserController::class, 'produsen'])->name('produsen.index');
        Route::get('/addprodusen', [ManageUserController::class, 'createProdusen'])->name('produsen.create');
        Route::post('/storeprodusen', [ManageUserController::class, 'storeProdusen'])->name('produsen.store');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile', 'update')->name('profile.update');
    });

    Route::prefix('monitoring')->group(function () {
        Route::controller(MonitoringProdusenController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/laporan-bulanan', 'laporanBulanan');
            Route::get('/laporan-bulanan/create', 'createLaporan');
            Route::post('/laporan-bulanan', 'storeLaporan')->name('produsen.laporan.store');
            Route::get('/laporan-bulanan/{id}', 'showLaporan')->name('produsen.laporan.detail');
            Route::put('/laporan-bulanan/{id}', 'updateLaporan')->name('produsen.laporan.update');
            Route::delete('/laporan-bulanan/delete/{id}', 'destroyLaporan')->name('produsen.laporan.destroy');
            Route::get('/riwayat-pencatatan', 'riwayatPencatatan')->name('riwayat.pencatatan');
        });
    });

    Route::prefix('monitoring-edukasi')->group(function () {
        Route::controller(EdukasiController::class)->group(function () {
            Route::get('/', 'index')->name('edukasi.index');
            Route::get('/create', 'createEdukasi')->name('edukasi.create');
            Route::post('/', 'storeEdukasiProdusen')->name('edukasi.store.produsen');
            Route::post('/dinas', 'storeEdukasiDinas')->name('edukasi.store.dinas');
            // Route::get('/edukasi/edit/{id}', 'showEdukasi')->name('edukasi.show');
            // Route::put('/edukasi/{id}', 'updateEdukasi')->name('edukasi.update');
            // Route::get('/edukasi/delete/{id}', 'destroyEdukasi')->name('edukasi.destroy');
        });
    });

    Route::prefix('monitoring-dinas')->group(function () {
        Route::controller(MonitoringDinasController::class)->group(function () {
            Route::get('/laporan-bulanan/dinas', 'laporanBulanan');
            Route::get('/laporan-bulanan/dinas/{userId}', 'showLaporan');
        });
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::get('/register', 'registerPage');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';
