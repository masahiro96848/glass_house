<?php

namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Matching;
use App\Job;
use Illuminate\Support\Facades\Auth;
use App\Enums\OfferType;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index() 
    {
        return view('mypage.index');
    }

    public function matching()
    {
        $current_user = Auth::user();
        $offers = Offer::all();         
        $offer_status = OfferType::getValue('Approved');
        $status = Offer::STATUS[3];

        return view('mypage.matching', [
            'current_user' => $current_user,
            'offers' => $offers,
            'offer_status' => $offer_status,
            'status' => $status,
        ]);
    }

    public function liking() 
    {
        $current_user = Auth::user();
        $users = $current_user->liking()->get()->sortByDesc('created_at');
        return view('mypage.liking', [
            'current_user' => $current_user,
            'users' => $users,
        ]);
    }

    public function liked()
    {
        $current_user = Auth::user();
        $users = $current_user->liked()->get()->sortByDesc('created_at');
        return view('mypage.liked', [
            'current_user' => $current_user,
            'users' => $users,
        ]);
    }

    public function job()
    {
        $current_user = Auth::user();
        $jobs = $current_user->jobs()->get()->sortByDesc('created_at');
        return view('mypage.job', [
            'current_user' => $current_user,
            'jobs' => $jobs,
        ]);
    }
}
