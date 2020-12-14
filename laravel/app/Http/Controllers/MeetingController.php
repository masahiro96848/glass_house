<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        return view('meeting.index');
    }

    public function show()
    {
        return view('meeting.show');
    }

    public function new()
    {
        return view('meeting.new');
    }

    public function confirm()
    {
        return view('meeting.confirm');
    }
}
