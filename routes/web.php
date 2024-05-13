<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BenihDataController;
use App\Http\Controllers\DataPencatatanController;
use App\Http\Controllers\PermintaanPesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




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
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::get('/register', 'registerPage');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout');
});
