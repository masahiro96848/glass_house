@extends('app')

@section('title', 'テーマ一覧')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
        <h3 class="p-detail--title">トークテーマ一覧・話題</h3>
        <div class="p-detail--tag">
          @foreach($tags as $tag)
            <a href="{{ route('tag.index', ['name' => $tag->name ])}}" class="p-detail--tagList">
              {{ $tag->hashtag }}
              <p class="p-detail--count">{{ $tag->jobs->count()}}</p>
            </a>
          @endforeach
        </div>
        <div class="p-card">
          @foreach($jobs as $job)
            <div class="p-card--area">
              <div class="p-card--content">
                <div class="p-card--photo">
                  <a href="{{ route('users.show', ['name' => $job->user->name])}}">
                    @if (!isset($job->user->profile_image))
                      <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image">
                    @else
                      <img src="{{$job->user->profile_image}}" alt="" class="c-user--image">
                    @endif
                  </a> 
                </div>
                <div class="p-card--box">
                  <div class="p-card--detail">
                    <a href="{{ route('job.show', [$job->id])}}">
                      <h4 class="p-card--title">{{ $job->title}}</h4>
                    </a>
                  </div>
                  <p class="p-card--paragragh">{{ $job->summary}}</p>
                  <div class="p-card--name">
                    <h5 class="p-card--userName">{{ $job->user->name}}</h5>
                  </div>
                  <div class="c-user--review">
                    <i class="far fa-comment-alt fa-lg"></i>
                    {{ $job->user->revieweds()->count()}}件
                  </div>
                  <div class="c-user--date">
                    <p>{{ $job->created_at->format('Y/m/d')}}</p>
                  </div>
                  @foreach($job->tags as $tag)
                    @if($loop->first)
                      <div class="p-card--tag">
                    @endif
                      <a href="{{ route('tag.index', ['name' => $tag->name])}}" class="c-user--tag">
                        {{ $tag->hashtag }}
                      </a>
                    @if($loop->last)
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="p-card--right">
                  @if(Auth::id() !== $job->user->id)
                    <a href="{{ route('offer.confirm', ['name' => $job->user->name])}}"><p class="p-card--apply">話してみたい</p></a>
                  @endif
                  <div class="c-user--likes">
                    @if(Auth::id() !== $job->user->id)
                      <user-like
                        :initial-liked-by='@json($job->user->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($job->user->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.like', ['id' => $job->user->id])}}"
                      >
                      </user-like>
                    @endif
                  </div>  
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
