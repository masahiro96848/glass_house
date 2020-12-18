@extends('app')

@section('title', 'ユーザー一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag l-container--title_pl">仲間を探す</h2>
    </div>
    <div class="l-container--wrapper">
      <div class="l-container--searchArea">
        <div class="p-search--select">
          <span class="p-search--title">評価順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
          <span class="p-search--title">いいね順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
          <span class="p-search--title">日付順</span>
            <select name="" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
            <button class="c-button c-button--submit c-button--submit--search " type="submit">検索</button>
        </div>
        <div class="l-container--wrapper">
          <div class="l-container--wrapperList l-container--between ">
          
            <div class="p-detail--tag">
              <a href="" class="p-detail--tagList">
                webエンジニア
              </a>
            </div>
          </div>
        </div>
        <div class="l-container--wrapper u-pt_0 l-container--flexstart">
          @foreach($users as $user)
            <div class="p-panel--box c-shadow--image">
              <div class="p-panel--area">
                <div class="p-panel-image">
                  <img src="./img/wed.jpeg" alt="" class="c-user--image">
                </div>
                <p class="p-panel--name">{{ $user->name }}</p>
              </div>
              <div class="c-user--detail">
                はじめまして　社会人4年目です。 Sierにて営業職しています！ 投資も歴で言ったら結構長くやっています。
              </div>
              <div class="p-panel--body">
                <div class="c-review--star">
                  🌟🌟🌟🌟🌟　レビュー４件
                </div>
                <div class="c-user--likes">
                  気になるリストに登録
                </div>
                <div class="c-user--count">
                  5人が気になるリストに登録済み
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection