<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Offer;
use App\Message;
use App\Matching;
use Illuminate\Support\Facades\Auth;
use App\Enums\OfferType;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('meeting.index', [
            'jobs' => $jobs
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
        
        return view('meeting.new');
    }
    
    public function create(Request $request)
    {
        $user = Auth::user();
        $job = Job::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('meeting.index');
    }

    // 申請確認画面
    public function confirm($id)
    {
        $user = User::where('id', $id)->first();
        $currnet_user = Auth::user();
        return view('meeting.confirm', [
            'user' => $user,
            'current_user' => $currnet_user,
        ]);
    }

    //申請送信画面
    public function apply(Request $request, $id) 
    {
        $current_user = Auth::user();
        $user = User::where('id', $id)->first();
        //offer作成
        $offer = Offer::create([
            'status' => $request->status,
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
        return view('meeting.offer', [
            'offer' => $offer,
            'matching' => $matching
        ]);
    }

    public function approve()
    {
        
    }
}
