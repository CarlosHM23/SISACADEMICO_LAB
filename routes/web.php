<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuraciones.index')->middleware('auth');
Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('admin.configuraciones.create')->middleware('auth');
Route::post('/admin/configuraciones/store', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuraciones.store')->middleware('auth');
Route::get('/admin/configuraciones/show/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('admin.configuraciones.show')->middleware('auth');
Route::get('/admin/configuraciones/edit/{id}', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuraciones.edit')->middleware('auth');
Route::put('/admin/configuraciones/update/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuraciones.update')->middleware('auth');
Route::delete('/admin/configuraciones/destroy/{id}', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('admin.configuraciones.destroy')->middleware('auth');
