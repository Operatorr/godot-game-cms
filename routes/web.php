<?php

use App\Http\Controllers\ChatStreamController;
use App\Http\Controllers\ThemeController;
use App\Models\Character;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/chat/stream', [ChatStreamController::class, 'stream'])->name('chat.stream');
Route::get('/chat', [ChatStreamController::class, 'chat'])->name('chat.test');

Route::post('/theme/update', [ThemeController::class, 'update'])->name('theme.update');
Route::get('/theme', [ThemeController::class, 'show'])->name('theme.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        $maxSlots = 6;
        $characters = Character::where('user_id', auth()->id())
            ->latest('created_at')
            ->get();

        return view('dashboard', [
            'characters' => $characters,
            'maxSlots' => $maxSlots,
        ]);
    })->name('dashboard');

    Route::post('characters', function () {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:50'],
            'class' => ['required', Rule::in(['Warrior', 'Mage', 'Ranger'])],
            'race' => ['required', Rule::in(['Human', 'Elf', 'Orc'])],
            'realm' => ['required', Rule::in(['Asia (Singapore)'])],
            'mode' => ['required', Rule::in(['softcore', 'hardcore'])],
        ]);

        Character::create([
            ...$data,
            'user_id' => auth()->id(),
            'level' => 1,
        ]);

        return redirect()->route('dashboard');
    })->name('characters.store');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
