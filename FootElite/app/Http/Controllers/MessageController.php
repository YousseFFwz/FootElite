<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\PlayerGame;
use Illuminate\Http\Request;

class MessageController extends Controller
{
      public function store(Request $request, $gameId)
        {
            $game = PlayerGame::with('players')->findOrFail($gameId);

            if (!$game->players->contains(auth()->id())) {
                return back()->with('error', 'Not allowed');
            }

            $request->validate([
                'message' => 'required'
            ]);

            Message::create([
                'user_id' => auth()->id(),
                'player_game_id' => $gameId,
                'message' => $request->message
            ]);

            return back();
        }
}
