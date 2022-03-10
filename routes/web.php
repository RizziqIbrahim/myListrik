<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PelangganController,
    UserController,
    PembayaranController,
    PenggunaanController,
    TagihanController,
    TarifController,
    AuthController,
    AdminController
};
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


//route auth
Route::get('/login',[AuthController::class, 'loginT'])->name('loginT');
Route::get('/register',[AuthController::class, 'registerT'])->name('registerT');
Route::post('/check/register', [AuthController::class, 'register'])->name("register");
Route::post('/check/login',[AuthController::class, 'login'])->name('login');


//protected route
Route::group(['auth:sanctum'],function () {
    //protected route admin
    Route::middleware('role:admin')->prefix('admin')->group(function (){
        Route::get('/admin',[AdminController::class, 'dashboard'])->name("dashboard-admin");
        //Route tarif untuk admin
        Route::get('tarif',[TarifController::class, 'index'])->name('tarif');
        Route::get('add-tarif',[TarifController::class, 'create'])->name('addtarif');
        Route::post('post-tarif',[TarifController::class, 'store'])->name('posttarif');
        Route::get('edit-tarif/{id}',[TarifController::class, 'edit'])->name('edittarif');
        Route::get('updatetarif',[TarifController::class, 'update'])->name('updatetarif');
        Route::get('deletetarif/{id}',[TarifController::class, 'destroy'])->name('deletetarif');

        //Route penggunaan untuk admin
        Route::get('penggunaan',[PenggunaanController::class, 'index'])->name('penggunaan');
        Route::get('add-penggunaan',[PenggunaanController::class, 'create'])->name('addpenggunaan');
        Route::post('post-penggunaan',[PenggunaanController::class, 'store'])->name('postpenggunaan');
        Route::get('edit-penggunaan/{id}',[PenggunaanController::class, 'edit'])->name('editpenggunaan');
        Route::get('updatepenggunaan',[PenggunaanController::class, 'update'])->name('updatepenggunaan');
        Route::get('deletepengunaan/{id}',[PenggunaanController::class, 'destroy'])->name('deletepenggunaan');
    });

    //protected route pelanggan
    Route::middleware('role:pelanggan')->prefix('pelanggan')->group(function (){
        Route::get('/pelanggan',[PelangganController::class, 'dashboard'])->name("dashboard-pelanggan");
    });

});