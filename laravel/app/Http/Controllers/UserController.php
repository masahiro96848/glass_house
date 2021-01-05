<?php

namespace App\Http\Controllers;

use App\User;
use App\Matching;
use App\Offer;
use App\Review;
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
            'user' => $user,
        ]);
    }

    public function new()
    {
        return view('users.new');
    }

    public function store(Request $request, $id)
    {
        $matching = Matching::find($id);
        $review = $matching->reviews()->create([
            'star' => $request->star,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('mypage.matching');
    }

    public function edit()
    {

    }
}
