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

    public function edit($name)
    {
        $user = User::where('name', $name)->first();
        return view('profile.edit', [
            'user' => $user
        ]);
    }
}
