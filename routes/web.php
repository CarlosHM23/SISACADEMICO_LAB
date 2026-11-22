<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil')->middleware('auth');
Route::put('/perfil', [App\Http\Controllers\HomeController::class, 'actualizarPerfil'])->name('perfil.update')->middleware('auth');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Dashboard')->name('dashboard')->middleware('auth');
Route::get('/carne-universitario', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Carné U.')->name('carne')->middleware('auth');
Route::get('/ficha-socioeconomica', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Ficha Socioeconómica')->name('ficha-socioeconomica')->middleware('auth');
Route::get('/pagos', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Pagos')->name('pagos')->middleware('auth');
Route::get('/informacion-academica', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Información académica')->name('informacion-academica')->middleware('auth');
Route::get('/mis-tramites', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Mis Trámites')->name('mis-tramites')->middleware('auth');
Route::get('/calidad', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Calidad')->name('calidad')->middleware('auth');
Route::get('/centro-de-idiomas', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Centro de Idiomas')->name('centro-idiomas')->middleware('auth');
Route::get('/aula-virtual', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Aula virtual')->name('aula-virtual')->middleware('auth');
Route::get('/biblioteca-virtual', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Biblioteca virtual')->name('biblioteca-virtual')->middleware('auth');
Route::get('/sistecu', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'SISTECU')->name('sistecu')->middleware('auth');
Route::get('/gedipi', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'GEDIPI')->name('gedipi')->middleware('auth');
Route::get('/calendario', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Calendario')->name('calendario')->middleware('auth');
Route::get('/bolsa-trabajo', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Bolsa de trabajo')->name('bolsa-trabajo')->middleware('auth');
Route::get('/libro-reclamaciones', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Libro de Reclamaciones')->name('libro-reclamaciones')->middleware('auth');
Route::get('/convenios-undc', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Convenios UNDC')->name('convenios-undc')->middleware('auth');
Route::get('/convocatoria-bienes-servicios', [App\Http\Controllers\HomeController::class, 'modulo'])->defaults('titulo', 'Convocatoria de bienes y servicios')->name('convocatoria-bienes-servicios')->middleware('auth');


//configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuraciones.index')->middleware('auth');
Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('admin.configuraciones.create')->middleware('auth');
Route::post('/admin/configuraciones/store', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuraciones.store')->middleware('auth');
Route::get('/admin/configuraciones/show/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('admin.configuraciones.show')->middleware('auth');
Route::get('/admin/configuraciones/edit/{id}', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuraciones.edit')->middleware('auth');
Route::put('/admin/configuraciones/update/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuraciones.update')->middleware('auth');
Route::delete('/admin/configuraciones/destroy/{id}', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('admin.configuraciones.destroy')->middleware('auth');
