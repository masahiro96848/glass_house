<?php

namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Matching;
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
        $offers = Offer::all();         
        $offer_status = OfferType::getValue('Approved');
        $status = Offer::STATUS[3];

        return view('mypage.matching', [
            'offers' => $offers,
            'offer_status' => $offer_status,
            'status' => $status,
        ]);
    }
}
