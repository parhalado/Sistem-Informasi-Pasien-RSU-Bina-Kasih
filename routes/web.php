<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Models\Patient;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pasien',[PatientController::class,'index']);
Route::get('/pasien/create',[PatientController::class,'create']);
Route::post('/pasien', [PatientController::class, 'store']);
Route::delete('/pasien/{id}',[PatientController::class,'delete']);
Route::get('/pasien/{id}/edit',[PatientController::class,'edit']);
Route::post('/pasien/{pasien}/update', [PatientController::class, 'update'])->name('update');