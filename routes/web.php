<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendMoneyController;
use App\Models\RecuringTransaction;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(callback: function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::post('/send-money', [SendMoneyController::class, '__invoke'])->name('send-money');

    Route::resource('recuring-transactions', RecuringTransaction::class);
});

require __DIR__.'/auth.php';
