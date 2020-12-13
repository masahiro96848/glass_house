@extends('app')

@section('title', 'タイトル名')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="p-member--layout">
        <div class="p-member--border">
          <div class="p-member--main">
            <h2>募集！！　自社開発企業に興味あるエンジニア募集！！</h2>
            <div class="p-member--image">
              <img src="../img/wed.jpeg" alt=""class="c-user--image" >
              <h4 class="p-member--name">masahiro</h4>
            </div>
          </div>
        </div>
        <div class="p-member--content u-mt_xxxl">
          <div class="p-member--title">
            <h4 class="p-member--title">募集！！　自社開発企業に興味あるエンジニア募集！！</h4>
          </div>
          <div class="p-member--time">
            <p>2020-12-08</p>
          </div>
          <div class="p-member--body">
            <p>
              ビジネス視点の強いクリエイターです。（フリーランス歴10年）

                  普段はフリーのUIUXデザイナー、個人ビジネスのコンサルティングなどをしつつ昼はカスタマーサクセス をやっています。１ヶ月間お休みをもらっているのですが、あまりにも人と話す機会がないので今回募集させていただきました。

                  日本時間の17時以降で30分程度、お話ができればと思っております。

                  ・今のパリの感じを知りたい
                  ・雑談したい
                  ・事業の相談をしたい
                  ・人生の相談をしたい

                  など、なんでもOKです。

                  最近私が興味があるのは「ウェルビーイング」です。

                  話しているうちに元気になるタイプなので、
                  是非是非、私に話すきっかけをいただければと思います。
                  雰囲気などはブログやインスタを見ていただければと思います。
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