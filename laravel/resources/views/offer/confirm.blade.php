@extends('app')

@section('title', '確認画面')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-member--other">{{$user->name}}さんへの申請</h3>
        <div class="l-container--border ">
          <form method="post" action="{{ route('offer.confirm', ['name' => $user->name])}}" enctype="multipart/form-data">
            @csrf
            <div class="p-comment--area">
              <div class="c-user--feature u-bb--none">
                <div class="c-user--Container p-confirm--Container">
                  <h5 class="c-user--featureTitle p-confirm--title">申請するユーザー名</h5>
                  <div class="c-user--featureArea">
                    <div class="c-user">
                      <img src="/img/wed.jpeg" alt=""class="c-user--image--sm" >
                      <span class="">{{ $user->name}}</span>
                    </div>
                  </div>
                </div>      
                <div class="p-comment--button">
                    <button class="c-button--message" onfocus="this.blur();">申請する</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection
