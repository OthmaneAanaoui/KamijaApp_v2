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
    return view('welcome');
});

Auth::routes();
Route::get('/list-groupes/{id}', [App\Http\Controllers\EquipeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::Post('/add-group', [App\Http\Controllers\EquipeController::class, 'store']);
Route::get('/list-user/id={id}', [App\Http\Controllers\EquipeController::class, 'getListUser']);

//addToEquipe

Route::post('/add-new-membre/userid={userid}/groupeid={groupeid}', [App\Http\Controllers\EquipeController::class, 'addNewMembre']);

Route::post('/add-new-membre2', [App\Http\Controllers\EquipeController::class, 'addNewMembre2']);



