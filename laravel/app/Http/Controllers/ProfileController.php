<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $reviews = $user->revieweds()->get()->sortByDesc('created_at');
        return view('profile.home', [
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('profile.edit', [
            'user' => $user,
            'categories' => $categories,
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
