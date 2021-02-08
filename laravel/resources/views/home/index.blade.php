@extends('app')

@section('title', 'Topページ')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--top">
        <div class="p-home--main">
          <div class="p-home--mainTitle">
            <h2 class="p-home--title">オンラインでお仕事の話をしませんか？</h2>
            <h2 class="p-home--title">お酒 ✖︎ オンライン ✖︎ マッチングで繋がろう！</h2>
          </div>
          <div class="p-home--buttonArea">
            <div class="p-home--buttonTop">
              <p class="p-home--login"><a href="{{ route('login')}}" class="p-home--link">ログイン</a></p>
              <p class="p-home--register"><a href="{{ route('register')}}" class="p-home--link">新規登録</a></p>
            </div>
          </div>
        </div>
        <div class="p-home--contentsTitle">
          <h3>タイトル名とは？</h3>
          <p class="p-home--paragraph">
            タイトル名は、。<br>
           
          </p>
        </div>
        <div class="p-home--contents">
          <div class="p-home--panel">
            <div class="p-home--head">
              {{-- <img src="./img/content01.jpeg" alt=""> --}}
            </div>
            <div class="p-home--body">
              <p>。</p>
            </div>
          </div>
          <div class="p-home--panel">
            <div class="p-home--head">
              {{-- <img src="./img/content02.jpg" alt=""> --}}
            </div>
            <div class="p-home--body">
              
            </div>
          </div>
          <div class="p-home--panel">
            <div class="p-home--head">
              {{-- <img src="./img/content03.jpg" alt=""> --}}
            </div>
            <div class="p-home--body">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  @include('footer')
@endsection