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
                <h3 class="c-user--name">{{ $user->name }}</h3>
              </div>
              <div class="c-user--review  c-user--review--center">
                <i class="far fa-comment-alt fa-lg"></i>
                {{ $user->revieweds()->count()}}件
              </div>
              <div class="c-user--profile">
                <p class="c-user--edit"><a href="{{ route('profile.edit')}}">プロフィール編集</a></p>
              </div>
              <p class="c-user--intro">{{ $user->intro}}</p>
            </div>
            <div class="c-user--feature">
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">カテゴリー</h5>
                <div class="c-user--featureArea">
                  @foreach($categories as $category)
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
              <h5 class="c-user--myName">{{ $user->name}}さんのレビュー</h5>
            </div>
            <div class="c-user--reviewContainer">
              @foreach($reviews as $review)
                <div class="c-user--card">
                  <div class="c-user--member">
                    <div class="c-user--imageArea">
                      <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                      <span class="c-user--other">{{ $review->reviewer->name}}</span>
                    </div>
                    <div class="c-user--opponent">
                      <span class="c-user--time">{{ $review->created_at->format('Y-m-d')}}</span>
                    </div>
                  </div>
                  <div class="c-user--reviewTitle">
                    <p class="c-user--title">{{ $review->title}}</p>
                    <p class="c-user--rate">
                      <comment-star
                        rating={{ $review->star }}
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
@endsection