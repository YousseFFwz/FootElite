<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\TeamInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamInviteController extends Controller
{
public function send($playerId)
{
    $team = auth()->user()->team;

    $profile = Profile::where('user_id', $playerId)->first();

    if ($profile->team_id === $team->id) {
        return back()->with('error', 'Player already in your team');
    }

    if ($profile->team_id) {
        return back()->with('error', 'Player already in another team');
    }

    TeamInvite::firstOrCreate([
        'team_id' => $team->id,
        'player_id' => $playerId,
    ]);

    return back()->with('success', 'Invite sent');
}


public function index()
{
    $invites = TeamInvite::where('player_id', Auth::id())
        ->where('status', 'pending')
        ->with('team')
        ->get();

    return view('player.invites', compact('invites'));
}


public function accept($id)
{
    $invite = TeamInvite::findOrFail($id);

    if ($invite->player_id !== auth()->id()) {
        abort(403);
    }

    $profile = auth()->user()->profile;

    if ($profile->team_id) {
        return back()->with('error', 'You already belong to a team');
    }

    $invite->update([
        'status' => 'accepted'
    ]);

    $profile->update([
        'team_id' => $invite->team_id
    ]);

    return back()->with('success', 'Joined team successfully');
}



public function reject($id)
{
    $invite = TeamInvite::findOrFail($id);

    if ($invite->player_id !== Auth::id()) {
        abort(403);
    }

    $invite->update([
        'status' => 'rejected'
    ]);

    return back()->with('success', 'Invite rejected');
}


}
