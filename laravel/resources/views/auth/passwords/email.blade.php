@extends('app')

@section('title', 'パスワード再設定')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper l-container--wrapper--auth  u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">パスワード再設定</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('password.email')}}">
              @csrf
              <label for="email">メールアドレス</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email"  value="{{ old('email')}}">
              </div>
                <button class="c-button c-button--submit" type="submit">メール送信</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
@endsection