@extends('app')

@section('title', 'Topページ')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="p-home--top">
        <div class="p-home--main">
          <div class="p-home--mainTitle">
            <h2 class="p-home--title">オンラインでお仕事の話をしませんか？</h2>
            <h2 class="p-home--title">お酒 ✖︎ オンライン ✖︎ マッチングで繋がろう！</h2>
          </div>
          <div class="p-home--buttonArea">
            <div class="p-home--buttonTop">
              <p class="p-home--login"><a href="{{ route('login')}}" class="p-home--link">ログイン</a></p>
              <p class="p-home--register"><a href="{{ route('register')}}" class="p-home--link">新規登録</a></p>
            </div>
          </div>
        </div>
        <div class="p-home--about">
          <div class="p-home--contentsTitle">
            <h3>glass houseとは？</h3>
            <p class="p-home--paragraph">
              お酒を飲みながら異業種との交流をするビジネスオンラインマッチングSNSです<br>
              気になる相手に「話してみたい」と送りましょう！ <br>
              金曜日の仕事終わり、休日の夜にお酒を飲みながらフランクに話しましょう！
            </p>
          </div>
          <div class="p-home--contents">
            <div class="p-home--panel">
              <div class="p-home--head">
                <img src="./img/zoom.sub01.jpeg" alt="">
              </div>
              <div class="p-home--body">
                <p>気になる相手に「話してみたい」を送りましょう。
                   日程や話したいことをメッセージで送りましょう。 
                </p>
              </div>
            </div>
            <div class="p-home--panel">
              <div class="p-home--head">
                <img src="./img/zoom.sub02.jpg" alt="">
              </div>
              <div class="p-home--body">
                <p>相手から承認されるとzoomミーティングが自動生成されます。
                  日程調整をして、zoomで会話をしましょう。
                </p>
              </div>
            </div>
            <div class="p-home--panel">
              <div class="p-home--head">
                <img src="./img/zoom.sub03.jpeg" alt="">
              </div>
              <div class="p-home--body">
                <p>お酒やおつまみなどを用意してフランクに話しましょう。
                  話終わったらレビュー評価をしましょう！
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="p-home--howto p-home--anker" id="howto">
          <div class="p-home--contentsTitle p-home--contentsTitle--link " >
            <div class="p-home--howto--area">
              <div class="p-home--howto--content">
                <h3 class="p-home--howto--title">glass houseの使い方</h3>
                <div class="p-home--left">
                  <div class="p-home--card">
                    <div class="p-home--screen">
                    <img src="./img/zoom.sub04.png" alt="" class="p-home--image">
                    </div>
                    <div class="p-home--howto--use">
                      <h4 class="p-home--howto--head">トーク相手を探す</h4>
                      <p class="p-home--howto--body">
                      話してみたい相手を直接探せます。<br>
                      気になる相手にはいいねしておきましょう。<br>
                      後でマイページ管理で確認することができます。<br>
                      カテゴリー別でも検索できます。
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-home--howto--content">
                <div class="p-home--right">
                  <div class="p-home--card--reverse">
                    <div class="p-home--screen">
                      <img src="./img/zoom.sub05.png" alt="" class="p-home--image">
                    </div>
                    <div class="p-home--howto--use">
                      <h4 class="p-home--howto--head">トークテーマを探す</h4>
                      <p class="p-home--howto--body">
                      トークテーマは「自分が話しやすいユーザー」を探すことができます。<br>
                      自分の興味がある分野や職種などを募集しましょう。<br>
                      タグをつけてユーザーを増やしましょう。<br>
                      自分から発信して気になるユーザーを集めましょう。<br>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-home--howto--content">
                <div class="p-home--left">
                  <div class="p-home--card">
                    <div class="p-home--screen">
                    <img src="./img/zoom.sub06.png" alt="" class="p-home--image">
                    </div>
                    <div class="p-home--howto--use">
                      <h4 class="p-home--howto--head">メッセージやりとり・日程調整</h4>
                      <p class="p-home--howto--body">
                      マッチングが成立したらメッセージやりとりをしましょう。<br>
                      日程を調整して話したいことなどを確認しましょう。<br>
                      zoomで相手とフランクにお酒を飲みながら話しましょう！<br>
                      zoomが終わったらレビューもしましょう。
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-home--enjoy">
                <div class="p-home--message">
                  <h2 class="p-home--pr">週末はお酒を飲みながらお仕事の幅を広げませんか？ <br>
                      オンラインでつながりを増やそう！！
                  </h2>
                </div>
                <div class="p-home--free">
                  <p class="p-home--free--resister"><a href="{{ route('register')}}" class="p-home--link">無料で登録する</a> </p>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
@endsection