<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerGameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamInviteController;
use App\Http\Controllers\TeamJoinController;
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

    Route::get('/my-invites', [TeamInviteController::class, 'index']);
    Route::post('/invite/{id}/accept', [TeamInviteController::class, 'accept']);
    Route::post('/invite/{id}/reject', [TeamInviteController::class, 'reject']);

    Route::get('/teams', [TeamJoinController::class, 'index']);
    Route::get('/teams/{team}', [TeamJoinController::class, 'show']);
    Route::post('/teams/{team}/join', [TeamJoinController::class, 'send']);


});


Route::middleware(['auth'])->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);

});



Route::middleware(['auth', 'role:team_owner'])->group(function () {
  Route::get('/team-dashboard', function () {  
        return view('team.dashboard');
    });
    
    Route::get('/team', [TeamController::class, 'index']);
    Route::put('/team', [TeamController::class, 'update']);
    
    Route::get('/games/create', [GameController::class, 'create']);
    Route::post('/games', [GameController::class, 'store']);
    Route::get('/games', [GameController::class, 'index']);
    Route::post('/games/{id}/accept', [GameController::class, 'accept']);
    Route::post('/invite/{player}', [TeamInviteController::class, 'send']);
    Route::get('/team/requests', [TeamJoinController::class, 'requests']);

});
