@extends('app')

@section('title', 'オファー確認画面')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout l-container--layout--sp">
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
                      @if (!isset($user->profile_image))
                        <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image--sm  c-user--featureImage">
                      @else
                        <img src="{{$user->profile_image}}" alt="" class="c-user--image--sm  c-user--featureImage">
                      @endif
                      <span class="c-user--featureName">{{ $user->name}}</span>
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
@endsection
