<?php

use App\Http\Controllers\Admin\{ChecksController, UserController};
use App\Http\Controllers\Admin\{CarsController};
use Illuminate\Support\Facades\Route;

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
//TODOS USUARIOS

Route::get('/', function(){ return view ('master');});
Route::get('/products', function(){ return view ('products');});
Route::get('/user', [UserController::class, 'index'])->name('user.index');
//View CRIAR NOVO
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
//View EDITAR POR ID
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//View VER POR ID
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

//ROTA CRIAR
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
//ROTA EDITAR
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
//ROTA DELETAR
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//View CRIAR CARRO
Route::get('/cars/create/{user_id}', [CarsController::class, 'create'])->name('cars.create');
//VIEW EDITAR CARRO
Route::get('/cars/edit/{id}',[CarsController::class,'edit'])->name('cars.edit');

//ROTA CRIAR CARRO
Route::post('/cars/create',[CarsController::class, 'store'])->name('cars.store');
//ROTA EDITAR CARRO
Route::put('/cars/{id}',[CarsController::class, 'update'])->name('cars.update');
//ROTA DELETAR CARRO
Route::delete('/cars/{id}', [CarsController::class, 'destroy'])->name('cars.destroy');


//VIEW CARRO + CHECKS
Route::get('/checks/{car_id}', [ChecksController::class, 'index'])->name('checks.index');
//VIEW CREATE CHECK
Route::get('/checks/create/{car_id}', [ChecksController::class, 'create'])->name('checks.create');
//VIEW EDIT CHECK
Route::get('/checks/edit/{check_id}', [ChecksController::class, 'edit'])->name('checks.edit');

//ROTA CRIAR CHECK
Route::post('/checks/store', [ChecksController::class, 'store'])->name('checks.store');
//ROTA UPDATE CHECK
Route::put('/checks/{check_id}', [ChecksController::class, 'update'])->name('checks.update');
//ROTA DELETE CHECK
Route::delete('checks/{id}', [ChecksController::class, 'destroy'])->name('checks.destroy');
