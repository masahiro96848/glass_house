<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home()
    {
        // $user = User::where('name', $name)->first();
        $user = Auth::user();
        return view('profile.home', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'intro' => $request->intro,
            'talk_theme' => $request->talk_theme,
            'speaking' => $request->speaking
        ]);

        return redirect()->route('profile.home', [
            'name' => $request->name,
        ]);
    }
}
