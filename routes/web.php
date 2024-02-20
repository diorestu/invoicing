<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContractController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth']);


// password Xendit : Asta2024Xendit!


Route::get('/wa-api', function () {
    wa_api("6285739940320", "Halo");
});

Route::controller(UserController::class)->middleware('auth')->name('users.')->group(function () {
    Route::get('/users', 'index')->name('index');
    Route::post('/users', 'store')->name('store');
    Route::get('/users/create', 'create')->name('create');
    Route::get('/users/{user}/edit', 'edit')->name('edit');
    Route::put('/users/{user}/update', 'update')->name('update');
    Route::delete('/users/{user}/delete', 'delete')->name('delete');
});
Route::controller(VendorController::class)->middleware('auth')->name('vendor.')->group(function () {
    Route::get('/vendor', 'index')->name('index');
    Route::post('/vendor', 'store')->name('store');
    Route::get('/vendor/create', 'create')->name('create');
    Route::delete('/vendor/{vendor}/delete', 'delete')->name('delete');
});

Route::controller(ClientController::class)->middleware('auth')->name('client.')->group(function () {
    Route::get('/client', 'index')->name('index');
    Route::post('/client', 'store')->name('store');
    Route::get('/client/create', 'create')->name('create');
    Route::get('/client/{client}/edit', 'edit')->name('edit');
    Route::put('/client/{client}/update', 'update')->name('update');
    Route::delete('/client/{client}/delete', 'delete')->name('delete');
});

Route::controller(ContractController::class)->middleware('auth')->name('contract.')->group(function () {
    Route::get('/contract', 'index')->name('index');
    Route::get('/contract/riwayat', 'history')->name('history');
    Route::get('/contract/pekerjaan', 'indexPekerjaan')->name('index-pekerjaan');
    Route::get('/contract/tambah', 'create')->name('create');
    Route::get('/contract/tambah-pekerjaan', 'createPekerjaan')->name('create-pekerjaan');
    Route::post('/contract', 'store')->name('store');
    Route::post('/contract/tambah-pekerjaan', 'storePekerjaan')->name('store-pekerjaan');
    Route::get('/contract/{contract}/edit', 'edit')->name('edit');
    Route::get('/contract/konfirmasi', 'confirm')->name('confirm');
    Route::get('/contract/addendum/{id}', 'addendum')->name('addendum');
    Route::post('/contract/addendum', 'addendumProcess')->name('addendum.process');
    Route::get('/contract/addendum/{id}/detail', 'addendumDetail')->name('addendum.detail');
    Route::get('/contract/{contract}/', 'show')->name('show');
    Route::get('/contract/{contract}/detail-pekerjaan', 'showPekerjaan')->name('show-pekerjaan');
    Route::put('/contract/{contract}/update', 'update')->name('update');
    Route::delete('/contract/{contract}/delete', 'delete')->name('delete');
});

Route::controller(InvoiceController::class)->middleware('auth')->name('invoice.')->group(function () {
    Route::get('/invoice', 'index')->name('index');
    Route::post('/invoice', 'store')->name('store');
    Route::post('/invoice/{id}/ubah-status', 'ubahStatus')->name('ubah.status');
    Route::get('/invoice/{id}/ubah-overdue', 'setOverdue')->name('ubah.overdue');
    Route::get('/invoice/{id}/generate', 'generateInv')->name('generate');
    Route::get('/invoice/create', 'create')->name('create');
    Route::get('/invoice/{invoice}/edit', 'edit')->name('edit');
    Route::get('/invoice/{invoice}/', 'show')->name('show');
    Route::put('/invoice/{invoice}/update', 'update')->name('update');
    Route::delete('/invoice/{invoice}/delete', 'delete')->name('delete');
});

Route::controller(ExportController::class)->middleware('auth')->name('print.')->group(function () {
    Route::get('/contract/{id}/print', 'printContract')->name('contract');
    Route::get('/invoice/{id}/print', 'printInvoice')->name('invoice');
    Route::get('/invoice/{id}/receipt', 'printReceipt')->name('receipt');
    Route::get('/invoice/{id}/surat', 'printSurat')->name('surat');
});

Route::controller(ReportController::class)->middleware('auth')->name('laporan.')->group(function () {
    Route::get('/laporan', 'index')->name('index');
});


require 'auth.php';
