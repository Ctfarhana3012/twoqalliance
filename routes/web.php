<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;



Route::get('/', [CompanyController::class, 'index'])->middleware(['auth']);
//Route::get('/dashboard', function () {
  //  return view('dashboard');
 //})->middleware(['auth'])->name('dashboard');
 // testingg
Route::get('/homedashboard', [CompanyController::class, 'index'])->middleware(['auth'])->name('companies.index');
Route::get('companies/create', [CompanyController::class, 'create'])->middleware(['auth'])-> name('companies.create');
Route::post('companies/create', [CompanyController::class, 'store'])->middleware(['auth'])->name('companies.store');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->middleware(['auth'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->middleware(['auth'])->name('companies.update');
Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->middleware(['auth'])->name('companies.destroy');
require __DIR__.'/auth.php';

