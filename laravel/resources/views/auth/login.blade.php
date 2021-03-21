@extends('app')

@section('title', 'ログイン')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper l-container--wrapper--auth  u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">ログイン</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('login')}}">
              @csrf
              <label for="email">メールアドレス</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email"  value="{{ old('email')}}">
              </div>
              <label for="email">パスワード</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password" >
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="rememberCheck">
                <label class="form-check-label" for="rememberCheck">
                    ログイン状態を記憶する
                </label>
              </div>
                <button class="c-button c-button--submit" type="submit">ログイン</button>
                {{-- <p class="c-form--link">パスワードを忘れた方は<a href="{{ route('password.request')}}">こちら</a></p> --}}
                <p class="c-form--link">新規登録は<a href="{{ route('register')}}">こちら</a></p>
                {{-- <button class="c-button c-button--guest"> --}}
                  <a href="{{ route('login.guest')}}" class="c-button c-button--guest">ゲストログイン</a>
                {{-- </button> --}}
            </form>
          </div>
        </div>  
      </div>
    </div>
@endsection