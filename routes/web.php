<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('faculties', [FacultyController::class, 'index'])->name('faculties.index');

Route::get('faculties/exporting-excel', [FacultyController::class, 'exportExcel'])->name('faculties.export-excel');

Route::post('faculties/importing-excel', [FacultyController::class, 'importExcel'])->name('faculties.import-excel');
