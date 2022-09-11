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
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::post('/settings/price/update', [App\Http\Controllers\HomeController::class, 'settingsPriceUpdate'])->name('settings-price-update')->middleware(['permission:Price Manager']);
Route::post('/settings/password/update', [App\Http\Controllers\HomeController::class, 'settingsPasswordUpdate'])->name('settings-password-update');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users')->middleware(['permission:User Manager']);
Route::post('/users/add', [App\Http\Controllers\HomeController::class, 'userAdd'])->name('user-add')->middleware(['permission:User Manager']);
Route::get('/users/edit/{id}', [App\Http\Controllers\HomeController::class, 'userEdit'])->name('user-edit')->middleware(['permission:User Manager']);
Route::post('/users/update', [App\Http\Controllers\HomeController::class, 'userUpdate'])->name('user-update')->middleware(['permission:User Manager']);
Route::get('/users/list', [App\Http\Controllers\HomeController::class, 'userList'])->name('user-list')->middleware(['permission:User Manager']);


Route::post('/role/add', [App\Http\Controllers\HomeController::class, 'roleAdd'])->name('role-add')->middleware(['permission:User Manager']);
Route::get('/role/edit/{id}', [App\Http\Controllers\HomeController::class, 'roleEdit'])->name('role-edit')->middleware(['permission:User Manager']);
Route::post('/role/update', [App\Http\Controllers\HomeController::class, 'roleUpdate'])->name('role-update')->middleware(['permission:User Manager']);
Route::get('/role/list', [App\Http\Controllers\HomeController::class, 'roleList'])->name('role-list')->middleware(['permission:User Manager']);



Route::post('/donor/form', [App\Http\Controllers\HomeController::class, 'getDonorForm'])->name('get-donor-form')->middleware(['permission:Donor Add']);
Route::post('/donor/create', [App\Http\Controllers\HomeController::class, 'donorCreate'])->name('donor-create')->middleware(['permission:Donor Add']);
Route::post('/donor/edit', [App\Http\Controllers\HomeController::class, 'donorEdit'])->name('donor-edit')->middleware(['permission:Donor Edit']);
Route::get('/donor/edit/form/{id}', [App\Http\Controllers\HomeController::class, 'donorEditForm'])->name('donor-edit-form')->middleware(['permission:Donor Edit']);
Route::get('/donor/delete/{id}', [App\Http\Controllers\HomeController::class, 'donorDelete'])->name('donor-delete')->middleware(['permission:Donor Delete']);
Route::get('/donor/list', [App\Http\Controllers\HomeController::class, 'donorList'])->name('donor-list');
Route::post('/donor/report', [App\Http\Controllers\HomeController::class, 'donorReport'])->name('download-donor-report')->middleware(['permission:Donor Report']);


Route::post('/receipt/form', [App\Http\Controllers\HomeController::class, 'getReceiptForm'])->name('get-receipt-form')->middleware(['permission:Receipt Add']);
Route::post('/receipt/create', [App\Http\Controllers\HomeController::class, 'receiptCreate'])->name('receipt-create')->middleware(['permission:Receipt Add']);
Route::get('/receipt/cancel/{id}', [App\Http\Controllers\HomeController::class, 'receiptCancel'])->name('receipt-cancel')->middleware(['permission:Receipt Cancel']);
Route::get('/receipt/print/{id}', [App\Http\Controllers\HomeController::class, 'receiptPrint'])->name('receipt-print')->middleware(['permission:Receipt Print']);
Route::get('/receipt/list', [App\Http\Controllers\HomeController::class, 'receiptList'])->name('receipt-list');
Route::post('/receipt/report', [App\Http\Controllers\HomeController::class, 'receiptReport'])->name('download-receipt-report')->middleware(['permission:Receipt Report']);