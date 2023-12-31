<?php

use App\Http\Controllers\SchematicController;
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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/schematics/search', [SchematicController::class, 'search'])->name('schematics.search');
Route::resource('schematics', SchematicController::class);
Route::get('schematics/{id}/download', [SchematicController::class, 'downloadFile'])->name('schematics.download');

