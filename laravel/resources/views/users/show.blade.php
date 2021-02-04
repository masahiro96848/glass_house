@extends('app')

@section('title', $user->name. 'のプロフィール')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
        <div class="l-container--border">
          <div class="c-user--box">
            <div class="c-user--photo">
              <img src="../img/wed.jpeg" alt=""class="c-user--image--md" >
            </div>
            <div class="c-user--body">
              <div class="c-user--detail">
                <h3 class="c-user--name">{{ $user->name}}</h3>
              </div>
              <div class="c-user--review">
                <p>レビュー{{ $user->revieweds()->count()}}件</p>
              </div>
              <div class="c-user--like">
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
              @if(Auth::id() !== $user->id)
                <div class="c-user--apply">
                  <a href="{{route('offer.confirm', ['name' => $user->name])}}"><p class="p-card--apply">話してみたい</p></a> 
                </div>
              @endif
              <p class="c-user--intro">{{ $user->intro}}</p>
            </div>
            <div class="c-user--feature">
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">カテゴリー</h5>
                <div class="c-user--featureArea">
                  @foreach ($user->categories as $category)
                    <p class="c-user--categoryName">
                      {{ $category->name }}
                    </p>    
                  @endforeach
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">話のテーマ</h5>
                <div class="c-user--featureArea">
                  <p class="c-user--body">
                    {{ $user->talk_theme }}
                  </p>
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">こんな方と話したい</h5>
                <div class="c-user--featureArea">
                  <p class="c-user--featureBody">
                    {{ $user->speaking }}
                  </p>
                </div>
              </div>
            </div>
            <div class="c-user--reviewArea">
              <h5 class="c-user--myName">{{ $user->name }}さんへのレビュー</h5>
            </div>
            <div class="c-user--reviewContainer">
              @foreach ($reviews as $review)
                <div class="c-user--card">
                  <div class="c-user--member">
                    <div class="c-user--imageArea">
                      <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                      <span class="c-user--other">{{ $review->reviewer->name}}</span>
                    </div>
                    <div class="c-user--opponent">
                      <span class="c-user--time">{{ $review->created_at->format('Y-m-d')}}</span>
                      @if(Auth::id() === $review->reviewer->id)
                        <a href="{{ route('users.edit', ['r_id' => $review->id, 'm_id' => $review->matching->id])}}">
                          <i class="p-panel--edit fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                        </a>
                        <a href="" class="c-modal--open">
                          <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                        </a>
                        <div class="c-modal c-modal--js">
                          <div class="c-modal--bg c-modal--close"></div>
                          <div class="c-modal--display">
                            <p class="c-modal--title">レビューを削除しますか？</p>
                            <div class="c-modal--select">
                              <form action="{{ route('users.delete', ['r_id' => $review->id,  'm_id' => $review->matching->id])}}" method="POST" class="p-panel--trash">
                                @csrf
                                @method('DELETE')
                                <button class="p-panel--trash--button" onfocus="this.blur();" >
                                  <p class="c-modal--delete">削除する</p>
                                </button>
                              </form>
                              <a href="" class="c-modal--close c-modal--cancel">キャンセル</a>
                            </div>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="c-user--reviewTitle">
                    <p class="c-user--title">{{ $review->title}}</p>
                    <p class="c-user--rate">
                      <comment-star
                        rating={{ $review->star}}
                        :star-size=25
                        :read-only=true
                      >
                      </comment-star>
                    </p>
                    <p class="c-user--detail">
                      {{ $review->body}}
                    </p>
                  </div>
                </div>
              @endforeach        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection