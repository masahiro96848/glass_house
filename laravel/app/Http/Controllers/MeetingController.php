<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Offer;
use App\Message;
use App\Matching;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use App\Enums\OfferType;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;

class MeetingController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $tags = Tag::all();
        return view('meeting.index', [
            'jobs' => $jobs,
            'tags' => $tags,
        ]);
    }

    public function show($id)
    {
        $job = Job::where('id', $id)->first();
        return view('meeting.show', [
            'job' => $job,
        ]);
    }

    public function new()
    {
        $allTagNames = Tag::all()->map(function($tag) {
            return ['text' => $tag->name];
        });

        return view('meeting.new' , [
            'allTagNames' => $allTagNames,
        ]);
    }
    
    public function create(JobRequest $request)
    {
        $user = Auth::user();
        $job = Job::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'user_id' => $request->user()->id
        ]);

        $request->tags->each(function ($tagName) use ($job) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName,
            ]);
            $job->tags()->attach($tag);
        });
        return redirect()->route('meeting.index');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        $tagNames = $job->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        return view('meeting.edit', [
            'job' => $job,
            'tagNames' => $tagNames,
        ]);
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);
        $job->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'user_id' => $request->user()->id,
        ]);

        $job->tags()->detach();
        $request->tags->each(function ($tagNames) use ($job) {
            $tag = Tag::firstOrCreate([
                'name' => $tagNames,
            ]);
            $job->tags()->attach($tag);
        });

        return redirect()->route('meeting.show', [
            'id' => $job->id,
        ]);
    }

    // 申請確認画面
    public function confirm($name)
    {
        $user = User::where('name', $name)->first();
        $currnet_user = Auth::user();
        return view('meeting.confirm', [
            'user' => $user,
            'current_user' => $currnet_user,
        ]);
    }

    //申請送信画面
    public function apply(Request $request, $name) 
    {
        $current_user = Auth::user();
        $user = User::where('name', $name)->first();
        //offer作成
        $offer = Offer::create([
            'status' => Offer::STATUS[2],
            'user_id' => $request->user()->id,
        ]);

        // matchingを作成
        $matching = Matching::create([
            'apply_id' => $current_user->id,
            'approve_id' => $user->id,
            'offer_id' => $offer->id
        ]);

        return redirect()->route('meeting.offer', [
            'id' => $offer->id,
            'matching' => $matching
        ]);
    }

    //オファー画面
    public function offer($id)
    {
        
        $offer = Offer::find($id);
        $matching = $offer->matchings()->first();
        // MatchingPolicyでアクセス制限
        $this->authorize('view', $matching);
        return view('meeting.offer', [
            'offer' => $offer,
            'matching' => $matching
        ]);
    }

    public function approve(Request $request, $id)
    {
        $offer = Offer::where('id', $id)->first();
        $matching = $offer->matchings()->first();
         // MatchingPolicyでアクセス制限
        $this->authorize('view', $matching);
        $offer->update([
            'status' => Offer::STATUS[3],
        ]);

        return redirect()->route('mypage.matching', [
            'id' => $offer->id
        ]);
    }
}
