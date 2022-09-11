<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/donor/form', [App\Http\Controllers\HomeController::class, 'getDonorForm'])->name('get-donor-form');
Route::post('/donor/create', [App\Http\Controllers\HomeController::class, 'donorCreate'])->name('donor-create');
Route::post('/donor/edit', [App\Http\Controllers\HomeController::class, 'donorEdit'])->name('donor-edit');
Route::get('/donor/edit/form/{id}', [App\Http\Controllers\HomeController::class, 'donorEditForm'])->name('donor-edit-form');
Route::get('/donor/delete/{id}', [App\Http\Controllers\HomeController::class, 'donorDelete'])->name('donor-delete');
Route::get('/donor/list', [App\Http\Controllers\HomeController::class, 'donorList'])->name('donor-list');


Route::post('/receipt/form', [App\Http\Controllers\HomeController::class, 'getReceiptForm'])->name('get-receipt-form');
Route::post('/receipt/create', [App\Http\Controllers\HomeController::class, 'receiptCreate'])->name('receipt-create');
Route::get('/receipt/cancel/{id}', [App\Http\Controllers\HomeController::class, 'receiptCancel'])->name('receipt-cancel');
Route::get('/receipt/print/{id}', [App\Http\Controllers\HomeController::class, 'receiptPrint'])->name('receipt-print');
Route::get('/receipt/list', [App\Http\Controllers\HomeController::class, 'receiptList'])->name('receipt-list');
