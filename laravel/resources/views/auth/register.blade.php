@extends('app')

@section('title', '新規登録')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper l-container--wrapper--auth u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">新規登録</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('register')}}">
              @csrf
              <label for="nickname">名前</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="name"  value="{{ old('name')}}">
              </div>
              <label for="email">メールアドレス</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email"  value="{{ old('email')}}">
              </div>
              <label for="email">パスワード</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password">
              </div>
              <label for="email">パスワード再確認</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password_confirmation">
              </div>
                <button class="c-button c-button--submit" type="submit">ユーザー登録</button>
                <p class="c-form--link">ログインは<a href="{{ route('login')}}">こちら</a></p>
            </form>
          </div>
        </div>  
      </div>
    </div>
@endsection