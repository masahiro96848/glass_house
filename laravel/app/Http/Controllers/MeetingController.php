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
        return view('meeting.offer');
    }

    public function confirm()
    {
        return view('meeting.confirm');
    }

    public function store(Requerst $request, $id, $name) 
    {
        $user = User::where('name', $name)->first();

        if($user->id === $request->user()->id) {
            return abort('404', 'Cannot offer yourself');
        }

        $request->user()->offers()->detach($name);
        $request->user()->offers()->attach($name);

        return redirect()->route('meeting.offer', [
            'id' => $id,
        ]);
    }

    public function message()
    {
        return view('meeting.message');
    }
}
