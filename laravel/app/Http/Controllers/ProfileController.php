<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $categories = $user->categories()->get();
        $reviews = $user->revieweds()->get()->sortByDesc('created_at');
        return view('profile.home', [
            'user' => $user,
            'categories' => $categories,
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

    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'intro' => $request->intro,
            'talk_theme' => $request->talk_theme,
            'speaking' => $request->speaking
        ]);

        $user->categories()->detach();
        $user->categories()->attach($request->category);

        // $profile_image = $request->file('profile_image');
        // $path  = Storage::disk('s3')->putFile('myprefix', $profile_image, 'public');
        // $user->profile_image = Storage::disk('s3')->url($path);
        // $user->save();

        return redirect()->route('profile.home', [
            'name' => $request->name,
        ])->with('flash_message', 'プロフィール編集をしました');
    }
}
