<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;

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

Route::get('/productos', function () {
    return view('product');
})->middleware(['auth:sanctum', 'verified'])->name('productos');

Route::get('/ventas',  function () {
    return view('venta');
})->middleware(['auth:sanctum', 'verified'])->name('ventas');

Route::get('/ventas/listar',  function () {
    return view('venta_index');
})->middleware(['auth:sanctum', 'verified'])->name('ventas.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);