<?php

namespace App\Http\Controllers;

use App\User;
use App\Matching;
use App\Offer;
use App\Review;
use Illuminate\Support\Facades\Auth;
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

    public function new($id)
    {
        $current_user = Auth::user();
        $user = User::where('id', $current_user->id)->get();
        $matching = Matching::where('id', $id)->first();
        return view('users.new', [
            'current_user' => $current_user,
            'user' => $user,
            'matching' => $matching,
        ]);
    }

    public function store(Request $request, $id)
    {
        $current_user = Auth::user();
        $matching = Matching::find($id);
        $review = Review::create([
            'star' => $request->star,
            'title' => $request->title,
            'body' => $request->body,
            'reviewer_id' => $current_user->id,
            'reviewed_id' => $request->user()->id,
        ]);

        return redirect()->route('users.show', [
            'name' => $request->user()->name,
        ]);
    }

    public function edit()
    {

    }
}
