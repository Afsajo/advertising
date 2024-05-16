<?php

use App\Http\Controllers\AdminPemesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\GuestProductController;
use App\Http\Controllers\MemberKeranjangController;
use App\Http\Controllers\MemberPemesananController;

Route::get('/', [GuestProductController::class, 'index'])->name('awal');

Route::get('/product', [GuestProductController::class, 'index'])->name('guest.product.index');
Route::get('/product/{product}', [GuestProductController::class, 'show'])->name('guest.product.show');

Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {

    Route::resource('product', ProductController::class);
    Route::resource('bank', BankController::class);
    Route::get('/pemesanan', [AdminPemesananController::class, 'index'])->name('admin.pemesanan.index');
    Route::get('/pemesanan/{pemesanan}', [AdminPemesananController::class, 'detail'])->name('admin.pemesanan.detail');

});

Route::middleware(['auth', 'user-access:member'])->prefix('member')->group(function () {

    Route::get('/keranjang', [MemberKeranjangController::class, 'show'])->name('member.keranjang.show');
    Route::post('/keranjang', [MemberKeranjangController::class, 'add'])->name('member.keranjang.add');
    Route::delete('/keranjang/{keranjang}', [MemberKeranjangController::class,
    'destroy'])->name('member.keranjang.destroy');
    Route::post('/keranjang/pemesanan', [MemberKeranjangController::class, 'pemesanan'])->name('member.keranjang.pemesanan');

    Route::get('/pemesanan', [MemberPemesananController::class, 'index'])->name('member.pemesanan.index');
    Route::get('/pemesanan/{pemesanan}', [MemberPemesananController::class, 'bayar'])->name('member.pemesanan.bayar');
    Route::post('/pemesanan/{pemesanan}', [MemberPemesananController::class, 'store'])->name('member.pemesanan.bayar.store');

     Route::get('/kontak', function (){
        return view('member.kontak');
     })->name('member.kontak');

});



