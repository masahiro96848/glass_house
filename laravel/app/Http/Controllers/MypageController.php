<?php

namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Matching;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index() 
    {
        return view('mypage.index');
    }

    public function matching()
    {
        $offers = Offer::all();                
        return view('mypage.matching', [
            'offers' => $offers,
        ]);
    }
}
