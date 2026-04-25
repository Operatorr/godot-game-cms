<?php

use App\Http\Controllers\ChatStreamController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/chat/stream', [ChatStreamController::class, 'stream'])->name('chat.stream');
Route::get('/chat', [ChatStreamController::class, 'chat'])->name('chat.test');

Route::post('/theme/update', [ThemeController::class, 'update'])->name('theme.update');
Route::get('/theme', [ThemeController::class, 'show'])->name('theme.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
