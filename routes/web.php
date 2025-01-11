<?php

use App\Http\Controllers\pagecontroller;
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

Route::middleware('auth')->group(function () {
    // Personal Page
    Route::get('/personal', [pagecontroller::class, 'personal'])->name('pages.personal');
    
    // Schematic Routes
    Route::get('/schematics/delete', [SchematicController::class, 'delete'])->name('schematics.delete');
    Route::get('/schematics/create', [SchematicController::class, 'create'])->name('schematics.create');
    Route::get('schematics/bulk-create', [SchematicController::class, 'bulkCreate'])->name('schematics.bulk-create');
    Route::post('schematics/bulk-store', [SchematicController::class, 'bulkStore'])->name('schematics.bulk-store');
});

Route::get('/about', [pagecontroller::class, 'about'])->name('pages.about');
Route::get('/contact', [pagecontroller::class, 'contact'])->name('pages.contact');
Route::get('/', function () { return view('home.index'); });
Route::get('/home', function () { return view('home.index'); });

// Schematic Search and Show Routes
Route::get('/schematics/search', [SchematicController::class, 'search'])->name('schematics.search');
Route::get('/schematics/{id}', [SchematicController::class, 'show'])->name('schematics.show');

// Schematic Download Route
Route::get('schematics/{id}/download', [SchematicController::class, 'downloadFile'])->name('schematics.download');

//resource routes
Route::resource('schematics', SchematicController::class);
