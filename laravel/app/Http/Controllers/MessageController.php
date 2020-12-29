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
        $messages  = $offer->messages()->get();
        return view('message.index', [
            'id' => $offer->id,
            'offer' => $offer,
            'messages' => $messages
        ]);
    }

    public function store(Request $request, $id)
    {
        $offer = Offer::find($id);
        $matching = $offer->matchings()->first();
        $offer->messages()->create([
            'comment' => $request->comment,
            'to_user' => $matching->apply_id,
            'from_user' => $matching->approve_id,
        ]);

        return redirect()->route('message.index',['id' => $offer->id]);
    }
}
