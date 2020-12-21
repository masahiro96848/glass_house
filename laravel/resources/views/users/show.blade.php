@extends('app')

@section('title', $user->name. 'のプロフィール')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
        <div class="l-container--border">
          <div class="c-user--box">
            <div class="c-user--photo">
              <img src="../img/wed.jpeg" alt=""class="c-user--image--md" >
            </div>
            <div class="c-user--body">
              <div class="c-user--detail">
                <h3 class="c-user--name">{{ $user->name}}</h3>
              </div>
              <div class="c-user--review">
                <p>🌟🌟🌟🌟🌟　レビュー５件</p>
              </div>
              <div class="c-user--like">
                <p>気になるメンバーに登録</p>
              </div>
              <div class="c-user--apply">
                <a href="{{route('meeting.confirm', ['id' => $user->id])}}"><p class="p-card--apply">申請する</p></a> 
              </div>
              <p class="c-user--intro">{{ $user->intro}}</p>
            </div>
            <div class="c-user--feature">
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">カテゴリー</h5>
                <div class="c-user--featureArea">
                  <p class="c-user--categoryName">エンジニア</p>
                  <p class="c-user--categoryName">マーケティング</p>
                  <p class="c-user--categoryName">エンジニア</p>
                  <p class="c-user--categoryName">マーケティング</p>
                  <p class="c-user--categoryName">エンジニア</p>
                  <p class="c-user--categoryName">マーケティング</p>
                  <p class="c-user--categoryName">エンジニア</p>
                  <p class="c-user--categoryName">マーケティング</p>
                  <p class="c-user--categoryName">マーケティング</p>
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">話のテーマ</h5>
                <div class="c-user--featureArea">
                  <p class="c-user--body">
                    サービス開発 / 最近気になるアプリ・サービス / ラジオ / ポッドキャスト / プロレス / 野球（カープ） / 90年代のサブカルチャー / 映画 / ゲーム・オブ・スローンズ / ストレンジャー・シングス / 音楽（ヒップホップ・ラップ） / サウナ / ボードゲーム
                  </p>
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">こんな方と話したい</h5>
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
            <div class="c-user--reviewArea">
              <h5 class="c-user--myName">masahiroさんのレビュー</h5>
            </div>
            <div class="c-user--reviewContainer">
              <div class="c-user--card">
                <div class="c-user--member">
                  <div class="c-user--imageArea">
                    <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                    <span class="c-user--other">testUser01</span>
                  </div>
                  <div class="c-user--opponent">
                    <span class="c-user--time">2020-12-07</span>
                  </div>
                </div>
                <div class="c-user--reviewTitle">
                  <p class="c-user--title">マッチングサービスの情熱がお高い方でした</p>
                  <p class="c-user--rate">🌟🌟🌟🌟🌟</p>
                  <p class="c-user--detail">
                    サービス設計からそこへの思い、そして現在に至るまでの経緯など、本サービスを生み出すにあたり重んじられていらっしゃることに関し、非常に勉強をさせていただきました。引き続き、応援しております。本日はありがとうございました。
                  </p>
                </div>
              </div>
              <div class="c-user--card">
                <div class="c-user--member">
                  <div class="c-user--imageArea">
                    <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                    <span class="c-user--other">testUser01</span>
                  </div>
                  <div class="c-user--opponent">
                    <span class="c-user--time">2020-12-07</span>
                  </div>
                </div>
                <div class="c-user--reviewTitle">
                  <p class="c-user--title">マッチングサービスの情熱がお高い方でした</p>
                  <p class="c-user--rate">🌟🌟🌟🌟🌟</p>
                  <p class="c-user--detail">
                    サービス設計からそこへの思い、そして現在に至るまでの経緯など、本サービスを生み出すにあたり重んじられていらっしゃることに関し、非常に勉強をさせていただきました。引き続き、応援しております。本日はありがとうございました。
                  </p>
                </div>
              </div>
              <div class="c-user--card">
                <div class="c-user--member">
                  <div class="c-user--imageArea">
                    <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
                    <span class="c-user--other">testUser01</span>
                  </div>
                  <div class="c-user--opponent">
                    <span class="c-user--time">2020-12-07</span>
                  </div>
                </div>
                <div class="c-user--reviewTitle">
                  <p class="c-user--title">マッチングサービスの情熱がお高い方でした</p>
                  <p class="c-user--rate">🌟🌟🌟🌟🌟</p>
                  <p class="c-user--detail">
                    サービス設計からそこへの思い、そして現在に至るまでの経緯など、本サービスを生み出すにあたり重んじられていらっしゃることに関し、非常に勉強をさせていただきました。引き続き、応援しております。本日はありがとうございました。
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection