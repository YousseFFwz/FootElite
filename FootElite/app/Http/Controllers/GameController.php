<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class GameController extends Controller
{
public function create()
    {
        $terrains = Terrain::all();
        return view('games.create', compact('terrains'));
    }

    
}
