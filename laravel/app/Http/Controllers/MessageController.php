<?php

namespace App\Http\Controllers;

use App\User;
use App\Offer;
use App\Message;
use App\Matching;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message($id)
    {
        $offer = Offer::find($id);
        return view('message.index', [
            'id' => $offer->id,
            'offer' => $offer
        ]);
    }

    public function store(Request $request, $id)
    {
        
        $offer = Offer::find($id);
        $offer->messages()->create([
            'comment' => $request->comment,
            'to_user' => $request->approves()->id,
            'from_user' => $request->apply()->id,
        ]);

        return redirect()->route('message.index',['id' => $offer->id]);
    }
}
