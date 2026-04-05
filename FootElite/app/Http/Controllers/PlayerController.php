<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\TeamInvite;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
        {
            $players = Profile::with('user')->get();

            $invites = [];

            if (auth()->user()->role === 'team_owner') {
                $team = auth()->user()->team;

                if ($team) {
                    $invites = TeamInvite::where('team_id', $team->id)
                        ->pluck('player_id')
                        ->toArray();
                }
            }

            return view('players.index', compact('players', 'invites'));
        }


        public function show($id)
        {
            $player = Profile::with('user')->findOrFail($id);

            return view('players.show', compact('player'));
        }
}
