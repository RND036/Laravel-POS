<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/print-barcode/{id}', [App\Http\Controllers\BarcodeController::class, 'print'])->name('print-barcode');
Route::get('/', function () {
    return view('welcome');
});
