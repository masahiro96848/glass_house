@extends('app')

@section('title', 'ユーザー一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper">
      <div class="l-container--wrapper--search">
        <div class="l-container--top">
          <h2 class="l-container--title--tag">トーク相手を探す</h2>
        </div>
        
        <div class="c-search--modal c-search--modal--js " >
          <div class="c-search--modal--bg c-search--modal--close"></div>
            <div class="c-search--modal--display">
              <div class="l-container--wrapperList l-container--between ">
              <div class="p-detail--tag">
                @foreach($category_users as $category_user)
                  <a href="{{route('users.category', ['name' => $category_user->name])}}" class="p-detail--tagList">
                    {{ $category_user->name}}
                    <p class="p-detail--count">{{ $category_user->users->count()}}</p>
                  </a>
                @endforeach
              </div>
              </div>
            </div>
        </div>
      </div>
      <div class="c-search--box">
        <span class="c-search--modal--open c-search--category">
          <a href="" class="c-search--modal--open">
            <i class="fas fa-search fa-2x c-search--category--icon " aria-hidden="true"></i>
          </a>  
        </span>
      </div>
      <div class="l-container--wrapper u-pt_0 l-container--flexstart l-container--sp">
        @foreach($users as $user)
          <div class="p-panel--box c-shadow">
            <div class="p-panel--area">
              <div class="p-panel-image">
                <a href="{{ route('users.show', [$user->name])}}">
                  @if (!isset($user->profile_image))
                    <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image">
                  @else
                    <img src="{{$user->profile_image}}" alt="" class="c-user--image">
                  @endif
                </a>
              </div>
              <p class="p-panel--name">
                {{ $user->name }}
              </p>
            </div>
            <div class="c-user--professional">
                @foreach ($user->categories as $category)
                @if($loop->index < 1)
                <a href="{{route('users.category', ['name' => $category->name])}}">
                  <p class="c-user--category">
                    {{ $category->name}}
                  </p>
                </a>
                @endif
                @endforeach
              </div>
            <div class="c-user--detail">
              <p class="c-user--clamp">
                {{ $user->intro }}
              </p>
            </div>
            <div class="p-panel--body">
              <div class="c-user--review">
                <i class="far fa-comment-alt fa-lg"></i>
                  {{ $user->revieweds()->count()}}件
              </div>
              <div class="c-user--likes">
                @if(Auth::id() !== $user->id)
                  <user-like
                    :initial-liked-by='@json($user->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($user->count_likes)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.like', ['id' => $user->id])}}"
                  >
                  </user-like>
                @endif
              </div>
              <div class="c-user--apply">
                @if(Auth::id() !== $user->id)
                  <a href="{{route('offer.confirm', ['name' => $user->name])}}"><p class="p-card--apply">話してみたい</p></a> 
                @endif  
              </div>
            </div>
          </div>
        @endforeach
      </div>
        {{ $users->links('pagination::default') }}
      </div>
    </div>
  </div>
@endsection