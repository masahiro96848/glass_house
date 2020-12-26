<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Offer;
use App\Message;
use Illuminate\Support\Facades\Auth;
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
            'job' => $job
        ]);
    }

    public function new()
    {
        return view('meeting.new');
    }
    
    public function create(Request $request)
    {
        $job = Job::create([
            'title' => $request->title,
            'summary' => $request->summary,
        ]);

        return redirect()->route('meeting.index');
    }

    public function offer($id)
    {
        $offer = Offer::find($id);
        // dd($offer->approve);
        return view('meeting.offer', [
            'offer' => $offer,
            // 'approve' => $approve,
        ]);
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

    public function apply(Request $request, $id) 
    {
        $current_user = Auth::user();
        $user = User::where('id', $id)->first();
        $offer = Offer::create([
            'status' => $request->status,
        ]);
        $request->user()->matching()->attach($user);

        return redirect()->route('meeting.offer', [
            'id' => $offer->id,
            ''
        ]);
    }

    public function message()
    {
        return view('meeting.message');
    }
}
