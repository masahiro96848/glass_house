@extends('app')

@section('title', 'offer画面')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <h3 class="p-member--other">{{ $offer->approve->name }}zoom申請</h3>
        <div class="p-member--border">
          <div class="p-confirm--opponent">
            <p>申請したユーザー</p>
          </div>
          <div class="p-confirm--image">
            <img src="../img/wed.jpeg" alt=""class="c-user--image" >
            <h4 class="p-member--name">masahiro</h4>
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
                    <span class="p-confirm--name">Masahiro</span>
                  </div>
                </div>
              </div>
              <div class="c-user--Container">
                <p class="c-user--featureTitle p-confirm--mb">申請したユーザー</p>
                <div class="c-user--featureArea">
                  <div class="p-confirm--photo">
                    <img src="../img/wed.jpeg" alt=""class="c-user--image--sm" >
                    <span class="p-confirm--name">Testman</span>
                  </div>
                </div>
              </div>
              <div class="c-user--Container">
                <p class="c-user--featureTitle p-confirm--mb">メッセージ</p>
                <div class="c-user--featureArea">
                  <p class="c-user--featureBody">
                    オンライン、オフラインでコミュニティの運営に関わっている方
                    語学を勉強している方
                    副業を持っている方
                    子どもや親に関わる仕事をしている方
                    子育て中の方
                  </p>
                </div>
              </div>
            </div>
          <div class="p-confirm--preserve">
            <p class="p-confirm--apply">承認する</p>
            <p class="p-confirm--cancel">キャンセル</p>
          </div>
        </div>  
      </div>
    </div>
  </div>
  @include('footer')
@endsection

{{-- {{dd($offer->approve->name)}} --}}