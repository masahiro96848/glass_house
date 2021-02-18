@extends('app')

@section('title', 'Topページ')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--top">
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
        <div class="p-home--contentsTitle">
          <h3>Glass Houseとは？</h3>
          <p class="p-home--paragraph">
            お酒を飲みながら異業種との交流をするビジネスオンラインマッチングSNSです<br>
            気になる相手に「話してみたい」と送りましょう！ <br>
            金曜の仕事終わり、休日の夜にお酒を飲みながらフランクに話しましょう！
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
    </div>
  @include('footer')
@endsection