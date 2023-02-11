<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/compra', [CompraController::class, 'store'])->middleware(['auth'])->name('compra');
Route::get('/compra/facturar', [CompraController::class, 'facturar'])->middleware(['auth'])->name('facturar');
Route::get('factura/{id}', [FacturaController::class, 'show'])->middleware(['auth'])->name('factura');

require __DIR__.'/auth.php';
