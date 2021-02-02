<?php

namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait ZoomJWT
{
  private function generateZoomToken()
  {
    $key = env('ZOOM_API_KEY', '');
    $secret = env('ZOOM_API_SECRET', '');
    $payload = [
        'iss' => $key,
        'exp' => strtotime('*1 minite'),
    ];

    return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');

  }

  private function retrieveZoomUrl()
  {
    return env('ZOOM_API_URL');
  }

  private function zoomRequest()
  {
    $jwt = $this->generateZoomToken();
    $client = new Client([
      'base_url'=> env('ZOOM_API_URL')
    ]);
    $method = 'POST';
    $url = "https://api.zoom.us/v2/";

    $email = env('ZOOM_ACCOUNT_EMAIL');
    $path = 'users/' . $email . '/meetings';
    
    $options = [
      'headers' => [
        'authorization' => 'Bearer' . $jwt,
        'content-type' => 'application/json',
      ],
      'json' => [
          'topic' => 'test_meeting',
          'type' => self::MEETING_TYPE_SCHEDULE,
          'start_at' => '2020-08-31T18:30:00',
          'duration' => 30,
          'agenda' => '今日のアジェンダ',
      ],
    ];
    // dd($options);
    $response = $client->request('POST', $path, $options);
    $post = $response->getBody();
    $post = json_decode($post, true);
  
    // $list = json_decode((string)$response->getBody(), true);
    // dd($list);


    return $post;

  }

  public function sendRequest()
  {
    $jwt = $this->generateZoomToken(); // JWTで作成されたトークン
    $client = new Client([
      'base_url'=> env('ZOOM_API_URL')
    ]);
    $method = 'POST';
    $url = "https://api.zoom.us/v2/";

    $email = env('ZOOM_ACCOUNT_EMAIL');
    $path = 'users/' . $email . '/meetings';
    
    $options = [
      'headers' => [
        'authorization' => 'Bearer' . $jwt,
        'content-type' => 'application/json',
      ],
    ];
    // dd($options);
    $response = $client->request('POST', $url, $options);
    dd($response);
    $post = $response->getBody();
    $post = json_decode($post, true);
  
    // $list = json_decode((string)$response->getBody(), true);
    // dd($list);


    return $post;
  }

  public function zoomGet(string $path, array $query = [])  
  {
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();

    return $request->get($url . $path, $query);
  }

  // public function zoomPost($path)
  // {
  //   $url = $this->retrieveZoomUrl();
  //   return $this->sendRequest('POST', $path,);
  
  //   return $request->post($url,$path, $body);
  // }

  public function zoomPatch(string $path, array $body = [])
  {
    // $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();

    return $request->patch($url . $path, $body);
  }

  public function zoomDelete(string $path, array $body = [])
  {
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();

    return $request->delete($url . $path, $body);
  }

  public function toZoomTimeFormat(string $dateTime)
  {
    try {
        $date = new \DateTime($dateTime);
        return $date->format('Y-m-d\TH:i:s');
    } catch(\Exception $e) {
        Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());
        return '';
    }
  }

  public function toUnixTimeStamp(string $dateTime, string $timezone)
  {
    try {
        $date = new \DateTime($dateTime, new \DateTimeZone($timezone));
        return $date->getTimestamp();
    } catch (\Exception $e) {
        Log::error('ZoomJWT->toUnixTimeStamp : ' . $e->getMessage());
        return '';
    }
  }

  
}