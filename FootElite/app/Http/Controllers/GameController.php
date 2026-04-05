<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Terrain;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GameController extends Controller
{
public function create()
    {
        $terrains = Terrain::all();
        return view('games.create', compact('terrains'));
    }



    public function store(Request $request)
{
    $request->validate([
        'terrain_id' => 'required',
        'date' => 'required|date',
        'time' => 'required'
    ]);

    $team = auth()->user()->team;

    $matchDateTime = Carbon::parse($request->date . ' ' . $request->time);
   
    if ($matchDateTime->isPast()) {
        return back()->with('error', 'Match must be in the future');
        }
        
    $start = $matchDateTime;
    $end = (clone $start)->addHour();
    

    $terrainExists = Game::where('terrain_id', $request->terrain_id)
        ->whereBetween('match_date', [$start, $end])
        ->exists();

    if ($terrainExists) {
        return back()->with('error', 'Terrain already booked at this time');
    }

    $teamConflict = Game::where(function ($q) use ($team) {
            $q->where('team1_id', $team->id)
              ->orWhere('team2_id', $team->id);
        })
        ->whereBetween('match_date', [$start, $end])
        ->exists();

    if ($teamConflict) {
        return back()->with('error', 'Your team already has a match at this time');
    }

    $playersCount = $team->players()->count();

    if ($playersCount < 5) {
        return back()->with('error', 'You need at least 5 players to create a match');
    }

    Game::create([
        'team1_id' => $team->id,
        'terrain_id' => $request->terrain_id,
        'match_date' => $matchDateTime,
        'status' => 'pending'
    ]);

    return redirect('/games')->with('success', 'Match created successfully');
}

public function index(Request $request)
{
    $team = auth()->user()->team;

    $query = \App\Models\Game::with('team1', 'terrain');

    $query->where('team1_id', '!=', $team->id);

    if ($request->city) {
        $query->whereHas('terrain', function ($q) use ($request) {
            $q->where('location', $request->city);
        });
    }

    $games = $query->where('status', 'pending')->get();

    return view('games.index', compact('games'));
}

}
