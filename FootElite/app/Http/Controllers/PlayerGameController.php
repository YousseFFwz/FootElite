<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerGameController extends Controller
{
     public function create()
    {
        $terrains = \App\Models\Terrain::all();
        return view('player_games.create', compact('terrains'));
    }
}
