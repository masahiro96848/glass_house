@extends('app')

@section('title', 'タイトル名')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <div class="p-member--border">
          <div class="p-member--main">
            <h2>{{ $job->title}}</h2>
            <div class="p-member--image">
              <img src="../img/wed.jpeg" alt=""class="c-user--image" >
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
          <div class="p-member--apply">
            
              <a href="{{route('meeting.confirm', ['id' => $job->user->id])}}"><p class="p-card--apply">申請する</p></a> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection