@extends('app')

@section('title', $current_user->name. 'さんの')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
        <div class="p-card--tabArea">
          <div class="p-card--tab">
            <a href="{{ route('mypage.liking')}}"><h5 class="p-card--button">気になるリスト</h5></a>
          </div>
          <div class="p-card--tab">
            <a href="{{ route('mypage.liked')}}"><h5 class="p-card--button">あなたと話してみたいリスト</h5></a>
          </div>
          <div class="p-card--tab">
            <h5 class="p-card--button">マッチングリスト</h5>
          </div>
        </div>
        <div class="p-card">
          @foreach($users as $user)
            <div class="p-card--area">
              <div class="p-card--content">
                <div class="p-card--photo">
                  <a href="{{ route('users.show', ['name' => $user->name])}}">
                    <img src="../img/wed.jpeg" alt=""class="c-user--image" >
                  </a> 
                </div>
                <div class="p-card--box">
                  <div class="p-card--detail">
                    <h4 class="p-card--title">{{ $user->name }}</h4>
                  </div>
                  <p class="p-card--paragragh">{{ $user->intro}}</p>
                  <div class="p-card--name">
                    <h5 class="p-card--userName"></h5>
                  </div>
                  
                </div>
                <div class="p-card--right">
                  
                    <a href="{{ route('meeting.confirm', ['id' => $user->id])}}"><p class="p-card--apply">話してみたい</p></a>
                  
                  <p class="c-user--likes">
                    <user-like
                      :initial-liked-by='@json($user->isLikedBy(Auth::user()))'
                      :initial-count-likes='@json($user->count_likes)'
                      :authorized='@json(Auth::check())'
                      endpoint="{{ route('users.like', ['id' => $user->id])}}"
                    >
                    </user-like>
                  </p>
                    <p class="pcard--reviewCount">レビュー{{ $user->revieweds()->count()}} 件</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection
