<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductosController;
use Illuminate\Auth\Events\Logout;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('index', function () {
    return view('index');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-login', [AuthController::class, 'customlogin'])->name('custom.login');
Route::view('/loginsuccess','loginsuccess');
Route::get('logout',[AuthController::class, 'LogOut'])->name('logout');


Route::get('insertandoproducto', [ProductosController::class, 'insertandoproducto'])->name('insertandoproducto');
Route::post('insert-producto', [ProductosController::class, 'insertproducto'])->name('insert.producto');
Route::post('Search-producto', [ProductosController::class, 'Searchproducto'])->name('Search.producto');
Route::get('buscandoproducto', [ProductosController::class, 'buscandoproducto'])->name('buscandoproducto');
Route::resources(['producto'=>ProductosController::class]);
//Route::get('producto-edit', [ProductosController::class, 'productoedit'])->name('producto.edit');