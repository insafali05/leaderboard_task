<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderboardController;





Route::get('/', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/leaderboard/recalculate', [LeaderboardController::class, 'recalculate'])->name('leaderboard.recalculate');
