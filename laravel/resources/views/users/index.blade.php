@extends('app')

@section('title', 'ユーザー一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag l-container--title_pl">仲間を探す</h2>
    </div>
    <div class="l-container--wrapper">
      <div class="l-container--searchArea">
        <div class="p-search--select">
          <span class="p-search--title">評価順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
          <span class="p-search--title">いいね順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
          <span class="p-search--title">日付順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
            <button class="c-button c-button--submit c-button--submit--search " type="submit">検索</button>
        </div>
        <div class="l-container--wrapper">
          <div class="l-container--wrapperList l-container--between">
          
            <div class="p-detail--tag">
              <a href="" class="p-detail--tagList">
                webエンジニア
              </a>
            </div>
          </div>
        </div>

        <div class="l-container--wrapper u-pt_0 l-container--flexstart">
          @foreach($users as $user)
            <div class="p-panel--box c-shadow">
              <div class="p-panel--area">
                <div class="p-panel-image">
                  <a href="{{ route('users.show', [$user->name])}}">
                    <img src="./img/wed.jpeg" alt="" class="c-user--image c-shadow--image">
                  </a>
                </div>
                <p class="p-panel--name">
                  {{ $user->name }}
                </p>
              </div>
              <div class="c-user--professional">
                  @foreach ($user->categories as $category)
                  @if($loop->index < 2)
                  <a href="">
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
  @include('footer')
@endsection