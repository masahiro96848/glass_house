@extends('app')

@section('title', 'メンバー募集・仲間募集')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-detail--title">新着の仲間・メンバー募集</h3>
        <div class="p-detail--tag">
          @foreach($tags as $tag)
            <a href="{{ route('tag.index', ['name' => $tag->name ])}}" class="p-detail--tagList">
              {{ $tag->hashtag }}
            </a>
          @endforeach
        </div>
        <div class="p-card">
          @foreach($jobs as $job)
            <div class="p-card--area">
              <div class="p-card--content">
                <div class="p-card--photo">
                  <a href="{{ route('meeting.show', [$job->id])}}">
                    <img src="../img/wed.jpeg" alt=""class="c-user--image" >
                  </a> 
                </div>
                <div class="p-card--box">
                  <div class="p-card--detail">
                    <h4 class="p-card--title">{{ $job->title}}</h4>
                  </div>
                  <p class="p-card--paragragh">{{ $job->summary}}</p>
                  <div class="p-card--name">
                    <h5 class="p-card--userName">{{ $job->user->name}}</h5>
                  </div>
                  @foreach($job->tags as $tag)
                    @if($loop->first)
                      <div class="p-card--tag">
                    @endif
                      <a href="{{ route('tag.index', ['name' => $tag->name])}}">
                        {{ $tag->hashtag }}
                      </a>
                    @if($loop->last)
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="p-card--right">
                  @if(Auth::id() !== $job->user->id)
                    <a href="{{ route('meeting.confirm', ['id' => $job->user->id])}}"><p class="p-card--apply">話してみたい</p></a>
                  @endif  
                  <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                  <p class="pcard--starCount">5.0</p>
                    <p class="pcard--reviewCount">レビュー{{$job->user->revieweds->count() }}件</p>
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
