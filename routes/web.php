<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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

Route::get('/test', function () {
    $data = 'Dimas Cahyo';
    // return view('test', [
    //     'nama' => $data,
    //     'alamat' => 'Bogor'
    // ]);
    return view('test')
        ->with('nama', $data)
        ->with('alamat', 'Bogor');
});

Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/admin/category/create', [CategoryController::class, 'create']);
Route::post('/admin/category/create', [CategoryController::class, 'store']);
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/category/{category}', [CategoryController::class, 'show']);
Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit']);

Route::put('/admin/category/{category}', [CategoryController::class, 'update']);
Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy']);