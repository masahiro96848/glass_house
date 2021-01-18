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
    public function message($id, Message $message)
    {
        $matching = Matching::where('id', $id)->first();
        $messages = $matching->messages()->get();
        $this->authorize('viewAny', $matching);
        return view('message.index', [
            'matching' => $matching,
            'messages' => $messages
        ]);
    }

    public function store(Request $request, $id)
    {
        $current_user = Auth::user();
        $matching = Matching::find($id);
        if($matching->apply_id !== Auth::id()) {
            $matching->messages()->create([
                'comment' => $request->comment,
                'to_user' => $current_user->id,
                'from_user' => $matching->apply_id,
            ]);
        }elseif($matching->approve_id !== Auth::id()) {
            $matching->messages()->create([
                'comment' => $request->comment,
                'to_user' => $current_user->id,
                'from_user' => $matching->approve_id,
            ]);
        }else{
            return redirect()->route('mypage.matching');
        }

        return redirect()->route('message.index',['id' => $matching->id]);
    }
}
