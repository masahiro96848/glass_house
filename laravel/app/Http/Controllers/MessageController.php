<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message()
    {
        return view('message.index');
    }

    public function store()
    {
        
    }
}
