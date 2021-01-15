@extends('app')

@section('title', $current_user->name. 'さんの')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
        @include('mypage.tab')
        @include('mypage.common')
      </div>
    </div>
  </div>
  @include('footer')
@endsection
