@extends('app')

@section('title', 'タイトル名')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <div class="p-member--border">
          <div class="p-member--main">
            <h2>{{ $job->title}}</h2>
            <div class="p-member--image">
              <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              <h4 class="p-member--name">masahiro</h4>
            </div>
          </div>
        </div>
        <div class="p-member--content u-mt_xxxl">
          <div class="p-member--title">
            <h4 class="p-member--title">{{ $job->title}}</h4>
          </div>
          <div class="p-member--time">
            <p>2020-12-08</p>
          </div>
          <div class="p-member--body">
            <p>
              {{ $job->summary}}
            </p>
          </div>
          <div class="p-member--apply">
            <p class="p-card--apply">申請する</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection