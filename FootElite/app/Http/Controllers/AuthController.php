<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register') ;
    }

    public function register(Request $request)
    {
        
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:player,team_owner',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($user->role === 'player') {
            Profile::create([
                'user_id' => $user->id,
            ]);
        } 

        if ($user->role === 'team_owner') {
            Team::create([
                'name' => $user->name . "'s Team",
                'owner_id' => $user->id,
            ]);
        }

        Auth::login($user);

        return $this->redirectByRole();
    }

    public function showLogin()
    {
        return view('auth.login');
    }



    

    private function redirectByRole()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'team_owner') {
            return redirect('/team-dashboard'); 
        }

        return redirect()->route('dashboard');
    }
}
