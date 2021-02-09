<?php

namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use App\Meeting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait ZoomJWT
{
  public $client;
  public $jwt;
  public $headers;

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

  public function generateZoomToken()
  {
    $key = env('ZOOM_API_KEY', '');
    $secret = env('ZOOM_API_SECRET', '');
    $payload = [
        'iss' => $key,
        'exp' => strtotime('+1 minute'),
    ];
    return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');

  }

  private function retrieveZoomUrl()
  {
    return env('ZOOM_API_URL', '');
  }

  public function zoomRequest($data)
  {
    $email = env('ZOOM_ACCOUNT_EMAIL');
    $path = 'users/'. $email. '/meetings';
    $url = $this->retrieveZoomUrl();

    $body = [
      'headers' => $this->headers,
      'body' => json_encode([
              'topic'      => $data['topic'],
              'type'       => self::MEETING_TYPE_SCHEDULE,
              'start_at' => $this->toZoomTimeFormat($data['start_at']),
              'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
              'timezone'   => 'Asia/Tokyo',
          ]),
    ];

        $response =  $this->client->post($url.$path, $body);     
        // if($response->getStatusCode() === 201) {
        //   Meeting::create([
        //     'topic' => $data['topic'],
        //     'agenda' => $data['topic'],
        //     'start_at' => $data['topic'],
        //     'start_url' => $body['start_url'],
        //     'join_url' => $body['join_url'],
        //   ]);
        // }
        return [
          'success' => $response->getStatusCode() === 201,
          'data'    => json_decode($response->getBody(), true),
        ];
        
  }

  public function zoomGet(string $path, array $query = [])  
  {
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();

    return $request->get($url . $path, $query);
  }

  public function zoomPost($path)
  {
    // $url = $this->retrieveZoomUrl();
    // $request =  $this->zoomRequest('POST', $path,);
  
    // return $request->post($url,$path, $body);
  }

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