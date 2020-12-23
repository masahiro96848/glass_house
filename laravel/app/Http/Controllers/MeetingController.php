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

    public function offer()
    {
        // $offer_id = Offer::where('id', $id)->first();
        return view('meeting.offer' );
    }

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
            'apply_id' => $request->user()->id,
            'approve_id' => $user->id,
            'status' => $request->status,
        ]);
        

        return redirect()->route('meeting.offer', [
            'id' => $offer->id,
        ]);
    }

    public function message()
    {
        return view('meeting.message');
    }
}
