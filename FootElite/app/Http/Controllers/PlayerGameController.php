<?php

namespace App\Http\Controllers;

use App\Models\PlayerGame;
use App\Models\Terrain;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerGameController extends Controller
{
     public function create()
    {
        $terrains = Terrain::all();
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

        public function index()
        {
            $games = PlayerGame::with('players', 'terrain')->get();

            return view('player_games.index', compact('games'));
        }



        public function join($id)
        {
            $game = PlayerGame::with('players')->findOrFail($id);

            $userId = auth()->id();

            if ($game->players->contains($userId)) {
                return back()->with('error', 'You already joined this match');
            }

            $matchTime = Carbon::parse($game->match_date);

            $conflict = PlayerGame::whereHas('players', function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                })
                ->where('match_date', $matchTime)
                ->exists();

            if ($conflict) {
                return back()->with('error', 'You already have a match at this time');
            }

            if ($game->players->count() >= 10) {
                return back()->with('error', 'Match is full');
            }

            $game->players()->attach($userId);

            if ($game->players()->count() >= 10) {
                $game->update(['status' => 'accepted']);
            }

            return back()->with('success', 'Joined successfully');
        }




}
