@extends('app')

@section('title', 'レビューを投稿')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout l-container--layout--sp">
        <h3 class="p-member--other">レビューを登録</h3>
        <div class="l-container--border ">
          <div class="p-comment--area">
            <div class="c-user--feature u-bb--none">
              @include('error')
              <form method="POST" action="{{ route('users.store', ['id' => $matching->id])}}">
                @csrf
                @include('users.form')
              </form>
              <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel"><< マイページに戻る</p></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection