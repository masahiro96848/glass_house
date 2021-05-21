@extends('app')

@section('title', '新しいパスワードを設定')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper l-container--wrapper--auth  u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">新しいパスワードを設定</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('password.update')}}">
              @csrf

              <input type="hidden" name="email" value="{{ $email }}">
              <input type="hidden" name="token" value="{{ $token }}">

              <label for="email">新しいパスワード(半角英数字8文字以上)</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password" placeholder="半角英数字8文字以上">
              </div>
              <label for="email">新しいパスワード再入力(半角英数字8文字以上)</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password_confirmation" placeholder="半角英数字8文字以上">
              </div>
                <button class="c-button c-button--submit" type="submit">送信</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
@endsection