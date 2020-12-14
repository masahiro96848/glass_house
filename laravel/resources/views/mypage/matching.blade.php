@extends('app')

@section('title', 'マイページ')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <div class="p-card--tabArea">
          <div class="p-card--tab">
            <h5 class="p-card--button">気になるリスト</h5>
          </div>
          <div class="p-card--tab">
            <h5 class="p-card--button">あなたと話してみたいリスト</h5>
          </div>
          <div class="p-card--tab">
            <h5 class="p-card--button">マッチングリスト</h5>
          </div>
        </div>

        <div class="p-matching--list">
          
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection