@extends('app')

@section('title', 'メンバー募集・仲間募集')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-detail--title">新着の仲間・メンバー募集</h3>
        <div class="p-detail--tag">
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
        </div>
        <div class="p-card">
          @foreach($jobs as $job)
          <a href="{{ route('meeting.show', [$job->id])}}">
            <div class="p-card--area">
              <div class="p-card--content">
                <div class="p-card--photo">
                  <img src="../img/wed.jpeg" alt=""class="c-user--image" >
                </div>
                <div class="p-card--box">
                  <div class="p-card--detail">
                    <h4 class="p-card--title">{{ $job->title}}</h4>
                  </div>
                  <p class="p-card--paragragh">{{ $job->summary}}</p>
                  <div class="p-card--name">
                    <h5 class="p-card--userName">masahiro</h5>
                  </div>
                </div>
                <div class="p-card--right">
                  <p class="p-card--apply">申請する</p>
                  <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                  <p class="pcard--starCount">5.0</p>
                  <p class="pcard--reviewCount">レビュー5件</p>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection