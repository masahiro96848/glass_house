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
              <div class="p-comment--left">
                <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                @if($message->toUser)
                  <span class="p-comment--name">{{ $message->toUser->name}}</span>
                @else
                  <span class="p-comment--name">{{ $message->fromUser->name}}</span>
                @endif
                  <div class="p-comment--details">
                    <p>
                      {{ $message->comment}}
                    </p>
                  </div>
              </div>
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

{{-- {{dd($messages)}} --}}