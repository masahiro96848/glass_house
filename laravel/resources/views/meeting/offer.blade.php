@extends('app')

@section('title', 'offer画面')

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
            <img src="../img/wed.jpeg" alt=""class="c-user--image" >
            <h4 class="p-member--name">{{ $matching->apply->name}}</h4>
          </div>
          <div class="p-confirm--intro">
            <p>
              1人でも多くの人が自分の人生の価値に気づき、そのために全力で生きられるコミュニティを創っていきたいと思っています。誰かの【評価】に苛まれるのではなく、自分の【価値】をしっかり見出せるように。世界中にそんな人を増やしていけるプロジェクトを考えたいです。
            </p>
          </div>
        </div>
        <div class="p-member--content u-mt_xxxl">
          <div class="c-user--feature">
              <div class="c-user--Container p-confirm--mb">
                <p class="c-user--featureTitle">申請を受けたユーザー</p>
                <div class="c-user--featureArea">
                  <div class="p-confirm--photo">
                    <img src="../img/wed.jpeg" alt=""class="c-user--image--sm" >
                    <span class="p-confirm--name">{{ $matching->approve->name}}</span>
                  </div>
                </div>
              </div>
              <div class="c-user--Container">
                <p class="c-user--featureTitle p-confirm--mb">申請したユーザー</p>
                <div class="c-user--featureArea">
                  <div class="p-confirm--photo">
                    <img src="../img/wed.jpeg" alt=""class="c-user--image--sm" >
                    <span class="p-confirm--name">{{ $matching->apply->name}}</span>
                  </div>
                </div>
              </div>
            </div>
          <div class="p-confirm--preserve">
            @if(Auth::id() === $matching->apply->id)
              <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel">戻る</p></a>
            @else  
              <form method="POST" action="{{ route('meeting.approve', ['id' => $offer->id])}}">
                @csrf
                @method('PUT')
                <button class="p-confirm--apply">承認する</button>
              </form>
                <a href="{{route('mypage.matching')}}"><p class="p-confirm--cancel">キャンセルする</p></a>
            @endif
          </div>
        </div>  
      </div>
    </div>
  </div>
  @include('footer')
@endsection
