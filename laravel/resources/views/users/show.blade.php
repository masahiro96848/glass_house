@extends('app')

@section('title', 'ユーザー一覧')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-detail--title">新着の仲間・メンバー募集</h3>
        <div class="p-detail--tag">
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
          <a href="" class="p-detail--tagList">
            webエンジニア
          </a>
        </div>
        <div class="p-card">
          <div class="p-card--area">
            僕は
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection