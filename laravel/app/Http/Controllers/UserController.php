<?php

namespace App\Http\Controllers;

use App\User;
use App\Matching;
use App\Offer;
use App\Review;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        foreach($users as $user) {
            $user->revieweds();
        }
        
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($name) 
    {
        $user = User::where('name', $name)->first();
        $matchings = Matching::all();
        $reviews = $user->revieweds()->get()->sortByDesc('created_at');
        return view('users.show', [
            'user' => $user,
            'matchings' => $matchings,
            'reviews' => $reviews,
        ]);
    }

    public function new($id)
    {
        $current_user = Auth::id();
        $matching = Matching::where('id', $id)->first();
        
        return view('users.new', [
            'current_user' => $current_user,
            'matching' => $matching,
        ]);
    }

    public function store(Request $request, $id)
    {
        $current_user = Auth::user();
        $matching = Matching::find($id);
        $reviewed = Matching::where('apply_id', $matching->apply_id )
                                ->orWhere('approve_id', $matching->approve_id)->first();

        if($matching->apply_id !== Auth::id() ) {
            $review = Review::create([
                'star' => $request->star,
                'title' => $request->title,
                'body' => $request->body,
                'reviewer_id' => $current_user->id,
                'reviewed_id' => $matching->apply_id,
                'matching_id' => $matching->id
            ]);
            return redirect()->route('users.show',[
                'name' => $matching->apply->name
            ]);    
        }elseif($matching->approve_id  !== Auth::id()){
            $review = Review::create([
                'star' => $request->star,
                'title' => $request->title,
                'body' => $request->body,
                'reviewer_id' => $current_user->id,
                'reviewed_id' => $matching->approve_id,
                'matching_id' => $matching->id
            ]);
            return redirect()->route('users.show',[
                'name' => $matching->approve->name
            ]);  
        }else{
            return redirect()->route('mypage.matching');
        }
    }

    public function edit()
    {

    }

    public function like(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if($user->id === $request->user()->id) {
            return abort('404', '自分にはいいねできません');
        }
        $request->user()->liking()->detach($user);
        $request->user()->liking()->attach($user);

        return [
            'id' => $user->id,
            'countLikes' => $user->count_likes,
        ];
    }

    public function unlike(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if($user->id === $request->user()->id) {
            return abort('404', '自分にはいいねできません');
        }
        $request->user()->liking()->detach($user);

        return [
            'id' => $user->id,
            'countLikes' => $user->count_likes,
        ];
    }
}
