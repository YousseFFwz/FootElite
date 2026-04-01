<?php

namespace App\Http\Controllers;

use App\Models\PlayerGame;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerGameController extends Controller
{
     public function create()
    {
        $terrains = \App\Models\Terrain::all();
        return view('player_games.create', compact('terrains'));
    }


    public function store(Request $request)
        {
            $request->validate([
                'terrain_id' => 'required',
                'date' => 'required|date',
                'time' => 'required'
            ]);

            $matchDateTime = Carbon::parse($request->date . ' ' . $request->time);

            if ($matchDateTime->isPast()) {
                return back()->with('error', 'Match must be in the future');
            }

            $game = PlayerGame::create([
                'creator_id' => auth()->id(),
                'terrain_id' => $request->terrain_id,
                'match_date' => $matchDateTime,
                'status' => 'pending'
            ]);

            $game->players()->attach(auth()->id());

            return redirect('/player-games')->with('success', 'Match created');
        }



}
