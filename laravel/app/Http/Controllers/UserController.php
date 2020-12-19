<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($name) 
    {
        $user = User::where('name', $name)->first();
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function new()
    {
        return view('users.new');
    }
}
