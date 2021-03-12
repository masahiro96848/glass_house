@extends('app')

@section('title',  $category->name.'の検索結果')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper">
      <div class="l-container--wrapper--search">
        <div class="l-container--wrapperList l-container--between">
          <div class="l-container--top">
            <h2 class="l-container--title--tag">{{ $category->name }}の検索結果</h2>
          </div>
          <div class="p-detail--tag">
            @foreach($category_users as $category_user)
            <a href="{{route('users.category', [ 'name' => $category_user->name])}}" class="p-detail--tagList">
              {{ $category_user->name}}
              <p class="p-detail--count">{{ $category_user->users->count()}}</p>
            </a>
            @endforeach
          </div>
        </div>
      </div>

      <div class="l-container--wrapper u-pt_0 l-container--flexstart">
        @foreach($category->users as $user)
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
                @foreach ($user->categories as $category_tag)
                @if($loop->index < 2)
                <a href="{{route('users.category', ['name' => $category_tag->name])}}">
                  <p class="c-user--category">
                    {{ $category_tag->name}}
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