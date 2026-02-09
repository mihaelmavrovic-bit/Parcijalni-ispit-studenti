<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});


Route::resource('studenti', StudentController::class)->only(['index', 'create', 'store']);

Route::get('studenti/{student}', [StudentController::class, 'show'])->name('studenti.show');
    
Route::get('studenti/{student}/edit', [StudentController::class, 'edit'])->name('studenti.edit');
    
Route::put('studenti/{student}', [StudentController::class, 'update'])->name('studenti.update');
    
Route::delete('studenti/{student}', [StudentController::class, 'destroy'])->name('studenti.destroy');