<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('file-upload-to-s3', function () {
    return view('file.upload');
});

Route::post('uploading', function (Request $request) {
    if ($request->hasFile('myfile')) {
        $file = $request->file('myfile')->store('projects', [
            'disk' => 's3',
            'visibility' => 'public'
        ]);

        Log::info('url =>' . 'https://special-project-3001.s3.ap-southeast-1.amazonaws.com/' . $file);
        return redirect()->back()->with('message', 'File uploaded successfully!');
    }

    return redirect()->back()->with('message', 'File uploading Failed!');
})->name('uploading');

Route::get('faculties', [FacultyController::class, 'index'])->name('faculties.index');

Route::get('faculties/exporting-excel', [FacultyController::class, 'exportExcel'])->name('faculties.export-excel');

Route::post('faculties/importing-excel', [FacultyController::class, 'importExcel'])->name('faculties.import-excel');
