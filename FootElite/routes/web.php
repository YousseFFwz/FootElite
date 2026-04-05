<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerGameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');



Route::middleware(['auth', 'role:player'])->group(function () {

    Route::get('/dashboard', fn() => view('player.dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);


    Route::get('/player-games/create', [PlayerGameController::class, 'create']);
    Route::post('/player-games', [PlayerGameController::class, 'store']);
    Route::get('/player-games', [PlayerGameController::class, 'index']);
    Route::post('/player-games/{id}/join', [PlayerGameController::class, 'join']);

    Route::get('/player-games/{id}', [PlayerGameController::class, 'show']);
    Route::post('/player-games/{id}/message', [MessageController::class, 'store']);



});


Route::middleware(['auth'])->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);

});



Route::middleware(['auth', 'role:team_owner'])->group(function () {
  Route::get('/team-dashboard', function () {  
        return view('team.dashboard');
    });
    
});
