<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});
Route::get('/register', [CustomerController::class, 'index'])->name('register');
Route::post('/register', [CustomerController::class, 'store'])->name('store');
Route::get('/addtransaction',[TransactionController::class, 'index'])->name('add-transaction');
Route::post('/addtransaction',[TransactionController::class, 'store'])->name('store-transaction');
Route::get('/transactions/{cid}', [TransactionController::class, 'showTransactions'])->name('transaction.show');