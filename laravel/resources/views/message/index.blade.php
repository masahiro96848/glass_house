@extends('app')

@section('title', 'メッセージ')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-member--other">メッセージ</h3>
        <div class="l-container--border">
          <div class="p-comment--area">
            @foreach($messages as $message)
            @if(Auth::id() === $message->toUser->id)
              <div class="p-comment--right">
                <div class="p-comment--details p-comment--details--right">
                  <p>
                    {{ $message->comment}}
                  </p>
                </div>
                @if (!isset($messsage->toUser->profile_image))
                  <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image--sm">
                @else
                  <img src="{{$user->profile_image}}" alt="" class="c-user--image--sm">
                @endif
                @if($message->toUser)
                  <span class="p-comment--name">{{ $message->toUser->name}}</span>
                @else
                  <span class="p-comment--name">{{ $message->fromUser->name}}</span>
                @endif
              </div>
            @else
              <div class="p-comment--left">
                  @if (!isset($messsage->toUser->profile_image))
                    <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image--sm">
                  @else
                    <img src="{{$user->profile_image}}" alt="" class="c-user--image--sm">
                  @endif
                  @if($message->toUser)
                    <span class="p-comment--name">{{ $message->toUser->name}}</span>
                  @else
                    <span class="p-comment--name">{{ $message->fromUser->name}}</span>
                  @endif
                  <div class="p-comment--details p-comment--details--left">
                    <p>
                      {{ $message->comment}}
                    </p>
                  </div>
                </div>
              @endif
            @endforeach
          <div class="p-comment--form">
            <form method="POST" action="{{ route('message.store', ['id' => $matching->id])}}">
              @csrf
              <textarea name="comment" id="" cols="30" rows="10" placeholder="メッセージを入力してください" class="p-comment--text"></textarea>
              <div class="p-comment--button">
                <button class="c-button--message">メッセージを送信する</button>
                <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel"><< 戻る</p></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
