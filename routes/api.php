<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::controller(CustomerController::class)->prefix('customers')->group(function () {
    Route::post('/', 'create')->name('customers.create');
    Route::get('/', 'index')->name('customers.index');
    Route::put('/{customer}', 'update')->name('customers.update');
    Route::delete('/{customer}', 'delete')->name('customers.delete');
});
