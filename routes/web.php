<?php
use App\Http\Controllers\PaketController;

Route::prefix('paket')->group(function () {
    Route::get('/', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::post('/update/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::get('/delete/{id}', [PaketController::class, 'destroy'])->name('paket.delete');
});
Route::get('/crud', [PaketController::class, 'index'])->name('crud.index');
Route::get('/crud/create', [PaketController::class, 'create'])->name('crud.create');
Route::post('/crud/store', [PaketController::class, 'store'])->name('crud.store');

