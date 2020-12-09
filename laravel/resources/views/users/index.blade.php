@extends('app')

@section('title', 'ユーザー一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title u-ml_xxxl">
      <h2 class="l-container--title--tag">仲間を探す</h2>
    </div>
    <div class="l-container--wrapper">
      <div class="l-container--searchArea">
        <div class="p-searchSelect">
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
      </div>
    </div>
  </div>
@endsection