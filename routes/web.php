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

Use App\Http\Controllers\CursoController;
Use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class , 'index']);
Route::get('/cursos', [CursoController::class , 'index']);
Route::get('/cursos/cadastro', [CursoController::class , 'create']);
Route::get('/cursos/{id}', [CursoController::class , 'show']);
Route::post('/cursos', [CursoController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
