
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ScriptWriterController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');

Route::get('/scripts', [ScriptWriterController::class, 'index'])->name('scripts.index');
Route::post('/scripts', [ScriptWriterController::class, 'store'])->name('scripts.store');


