<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamJoinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamJoinController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        

        $requests = TeamJoinRequest::where('player_id', auth()->id())
            ->pluck('team_id')
            ->toArray();

        return view('player.teams', compact('teams', 'requests'));
    }

       public function show($id)
    {
        $team = \App\Models\Team::findOrFail($id);

    return view('player.team-show', compact('team'));
    }


        public function send($teamId)
{
    $profile = auth()->user()->profile;

    if ($profile->team_id) {
        return back()->with('error', 'You already have a team');
    }

    TeamJoinRequest::firstOrCreate([
        'team_id' => $teamId,
        'player_id' => auth()->id(),
    ]);

    return back()->with('success', 'Request sent');
}


        public function requests()
        {
            $team = Auth::user()->team;

            $requests = TeamJoinRequest::where('team_id', $team->id)
                ->where('status', 'pending')
                ->with('team', 'player') 
                ->get();

            return view('team.requests', compact('requests'));
        }
}
