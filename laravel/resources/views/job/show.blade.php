@extends('app')

@section('title', $job->title)

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <div class="p-member--border">
          <div class="p-member--main">
            <h2>{{ $job->title}}</h2>
            <div class="p-member--image">
              @if (!isset($job->user->profile_image))
                <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image">
              @else
                <img src="{{$job->user->profile_image}}" alt="" class="c-user--image">
              @endif
              <h4 class="p-member--name">{{ $job->user->name}}</h4>
            </div>
          </div>
        </div>
        <div class="p-member--content u-mt_xxxl">
          <div class="p-member--title">
            <h4 class="p-member--title">{{ $job->title }}</h4>
          </div>
          <div class="p-member--time">
            <p>{{ $job->created_at->format('Y-m-d')}}</p>
          </div>
          <div class="p-member--body">
            <p>
              {{ $job->summary}}
            </p>
          </div>
          <div class="p-member--tag">
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
          @if(Auth::id() !== $job->user->id )
            <div class="p-member--apply">
                <a href="{{route('offer.confirm', ['name' => $job->user->name])}}"><p class="p-card--apply">話してみたい</p></a> 
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection