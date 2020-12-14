@extends('app')

@section('title', 'マイページ')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--lg">
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
        
        <div class="p-card">
          <div class="p-card--area">
            <div class="p-card--content">
              <div class="p-card--photo">
                <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              </div>
              <div class="p-card--body">
                <div class="p-card--detail">
                  <h4 class="p-card--title">ゆるっと何度でもお気軽にどうぞ</h4>
                </div>
                <p class="p-card--paragragh">仕事の話でも、そうでなくても、なんでもゆるっと気軽に話しませんか。 本日15時くらいまでの間でお時間合う方、よろしくお願いします。</p>
                <div class="p-card--name">
                  <h5 class="p-card--userName">masahiro</h5>
                </div>
              </div>
              <div class="p-card--right">
                <p class="p-card--apply">申請する</p>
                <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                <p class="pcard--starCount">5.0</p>
                <p class="pcard--reviewCount">レビュー5件</p>
              </div>
            </div>
          </div>
          <div class="p-card--area">
            <div class="p-card--content">
              <div class="p-card--photo">
                <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              </div>
              <div class="p-card--body">
                <div class="p-card--detail">
                  <h4 class="p-card--title">ゆるっと何度でもお気軽にどうぞ</h4>
                </div>
                <p class="p-card--paragragh">仕事の話でも、そうでなくても、なんでもゆるっと気軽に話しませんか。 本日15時くらいまでの間でお時間合う方、よろしくお願いします。</p>
                <div class="p-card--name">
                  <h5 class="p-card--userName">masahiro</h5>
                </div>
              </div>
              <div class="p-card--right">
                <p class="p-card--apply">申請する</p>
                <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                <p class="pcard--starCount">5.0</p>
                <p class="pcard--reviewCount">レビュー5件</p>
              </div>
            </div>
          </div>
          <div class="p-card--area">
            <div class="p-card--content">
              <div class="p-card--photo">
                <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              </div>
              <div class="p-card--body">
                <div class="p-card--detail">
                  <h4 class="p-card--title">ゆるっと何度でもお気軽にどうぞ</h4>
                </div>
                <p class="p-card--paragragh">仕事の話でも、そうでなくても、なんでもゆるっと気軽に話しませんか。 本日15時くらいまでの間でお時間合う方、よろしくお願いします。</p>
                <div class="p-card--name">
                  <h5 class="p-card--userName">masahiro</h5>
                </div>
              </div>
              <div class="p-card--right">
                <p class="p-card--apply">申請する</p>
                <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                <p class="pcard--starCount">5.0</p>
                <p class="pcard--reviewCount">レビュー5件</p>
              </div>
            </div>
          </div>
          <div class="p-card--area">
            <div class="p-card--content">
              <div class="p-card--photo">
                <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              </div>
              <div class="p-card--body">
                <div class="p-card--detail">
                  <h4 class="p-card--title">ゆるっと何度でもお気軽にどうぞ</h4>
                </div>
                <p class="p-card--paragragh">仕事の話でも、そうでなくても、なんでもゆるっと気軽に話しませんか。 本日15時くらいまでの間でお時間合う方、よろしくお願いします。</p>
                <div class="p-card--name">
                  <h5 class="p-card--userName">masahiro</h5>
                </div>
              </div>
              <div class="p-card--right">
                <p class="p-card--apply">申請する</p>
                <p class="p-card--star">🌟🌟🌟🌟🌟</p>
                <p class="pcard--starCount">5.0</p>
                <p class="pcard--reviewCount">レビュー5件</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection