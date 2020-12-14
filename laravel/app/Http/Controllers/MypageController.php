<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index() 
    {
        return view('mypage.index');
    }

    public function matching()
    {
        return view('mypage.matching');
    }
}
