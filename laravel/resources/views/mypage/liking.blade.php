@extends('app')

@section('title', $current_user->name. 'さんのいいねしたリスト')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--80">
        @include('mypage.tab')
        @include('mypage.common')
      </div>
    </div>
  </div>
@endsection
