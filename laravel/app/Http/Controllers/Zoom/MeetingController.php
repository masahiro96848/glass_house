<?php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;
use GuzzleHttp\Client;
use App\Matching;
use App\Meeting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class MeetingController extends Controller
{
    use ZoomJWT;

    public function __construct()
    {
        $this->client = new Client();
        $this->jwt = $this->generateZoomToken();
        $this->headers = [
        'Authorization' => 'Bearer'.$this->jwt,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        ];
    }

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function(&$meeting) {
            $meeting['statr_at'] = $this->toUnixTimeStamp($meeting['start_time'], $meeting['timezone']);
            return $meeting;
        }, $data['meeting']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];

    }

    public function new($id)
    {
        $matching = Matching::where('id', $id)->first();
        return view('meetings.new', [
            'matching' => $matching
        ]);
    }

    public function create(Request $request, Meeting $meeting, $id)
    { 
        $email = env('ZOOM_ACCOUNT_EMAIL');
        $path = 'users/'. $email. '/meetings';
        $response = $this->zoomPost($path, [
            'type' => self::MEETING_TYPE_SCHEDULE,
            'duration' => 30,
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ]);
        $body = json_decode($response->getBody(), true);
        $matching = Matching::find($id);

        if($response->getStatusCode() === 201) {
            Meeting::create([
                'meeting_id' => $body['meeting_id'],
                'start_url' => $body['start_url'],
                'join_url' => $body['join_url'],
                'matching_id' => $matching->id,
            ]);
        }
        $response = $this->zoomRequest($request->all());
        

        return redirect()->route('mypage.matching')->with('flash_message', 'zoomミーティングを作成しました！');
    }

    public function get(Request $request, string $id)
    {
        $path = 'meetings/'.$id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function edit($matching_id)
    {
        $meeting = Meeting::where('matching_id', $matching_id)->first();
        if(Auth::id() !== $meeting->matching->apply_id && Auth::id() !== $meeting->matching->approve_id){
            return redirect()->route('users.index');
        }
        return view('meetings.edit', [
            'meeting' => $meeting,
        ]);
    }

    public function update(Request $request, Meeting $meeting, $id)
    {
        $email = env('ZOOM_ACCOUNT_EMAIL');
        $meeting = Meeting::find($id);
        $path = 'meetings/'. $meeting->meeting_id;
        $response = $this->zoomUpdate($path, [
            'topic' => $request->topic,
            'agenda' => $request->agenda,
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($request->start_time),
            'duration' => 30,
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ]);
        
        $body = json_decode($response->getBody(), true);
        if($response->getStatusCode() === 204) {
            $meeting->update([
                'topic' => $request->topic,
                'agenda' => $request->agenda,
                'start_time' => $request->start_time,
            ]);
        }
        
        return redirect()->route('mypage.matching')->with('flash_message', 'zoomミーティングの日程を変更しました');
    }

    public function delete(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function setParams() 
    {
        $response = [
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $request->start_time,
            'duration' => 30,
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ];
    }


}
