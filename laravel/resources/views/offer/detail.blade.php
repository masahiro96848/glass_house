@extends('app')

@section('title', 'オファー詳細画面')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <h3 class="p-member--other">{{ $matching->approve->name}}さんへのzoom申請</h3>
        <div class="p-member--border">
          <div class="p-confirm--opponent">
            <p>申請したユーザー</p>
          </div>
          <div class="p-confirm--image">
            @if (!isset($matching->apply->profile_image))
              <img src="{{asset('img/no_image.jpg')}}" alt="" class="c-user--image">
            @else
              <img src="{{$matching->apply->profile_image}}" alt="" class="c-user--image">
            @endif
            <h4 class="p-member--name">{{ $matching->apply->name}}</h4>
          </div>
          <div class="">
            <p class="p-confirm--intro">
              {{ $matching->apply->intro}}
            </p>
          </div>
          <div class="p-confirm--preserve">
            @if(Auth::id() === $matching->apply->id)
              <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel">マイページに戻る</p></a>
            @else  
              <form method="POST" action="{{ route('offer.approve', ['id' => $offer->id])}}">
                @csrf
                @method('PUT')
                @if($offer->status === App\Offer::STATUS[3])
                  <button class="p-confirm--applied" onfocus="this.blur();" disabled>承認済み</button>
                @else
                  <button class="p-confirm--apply" onfocus="this.blur();">承認する</button>
                @endif  
              </form>
                <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel">マイページに戻る</p></a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
