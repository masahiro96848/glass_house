<?php

namespace App\Http\Controllers;

use App\Job;
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

    public function show()
    {
        return view('meeting.show');
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

    public function confirm()
    {
        return view('meeting.confirm');
    }

    public function message()
    {
        return view('meeting.message');
    }
}
