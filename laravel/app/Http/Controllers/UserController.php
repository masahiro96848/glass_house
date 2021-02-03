<?php

namespace App\Http\Controllers;

use App\User;
use App\Matching;
use App\Offer;
use App\Review;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

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
        $reviews = $user->revieweds()->get()->sortByDesc('created_at');
        return view('users.show', [
            'user' => $user,
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

    public function store(ReviewRequest $request, $id)
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
            ])->with('flash_message', 'レビューを投稿しました！');  
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
            ])->with('flash_message', 'レビューを投稿しました！');  
        }else{
            return redirect()->route('mypage.matching');
        }
    }

    public function edit($r_id, $m_id, Review $review)
    {
        $current_user = Auth::id();
        $review = Review::find($r_id);
        // ReviewPolicyでアクセス制限
        $this->authorize('update', $review);
        $matching = Matching::find($m_id);
        
        return view('users.edit', [
            'current_user' => $current_user,
            'review' => $review,
            'matching' => $matching,
        ]);
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::find($id);
         // ReviewPolicyでアクセス制限
        $this->authorize('update', $review);
        $review->update([
            'star' => $request->star,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('users.show', [
            'name' => $review->reviewed->name,
        ])->with('flash_message', 'レビューを編集しました！');
    }

    public function delete($r_id, $m_id)
    {
        $review = Review::find($r_id);
        // ReviewPolicyでアクセス制限
        $this->authorize('delete', $review);
        $matching = Matching::find($m_id);
        $review->delete();

        return redirect()->route('users.show', [
            'name' => $review->reviewed->name,
        ])->with('flash_message', 'レビューを削除しました！');
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
