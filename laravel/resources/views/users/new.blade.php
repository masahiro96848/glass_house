@extends('app')

@section('title', 'レビューを投稿')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-member--other">レビューを登録</h3>
        <div class="l-container--border ">
          <div class="p-comment--area">
            <div class="c-user--feature u-bb--none">
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">ユーザー名</h5>
                <div class="c-user--featureArea">
                  <div class="c-user">
                    <img src="/img/wed.jpeg" alt=""class="c-user--image--sm" >
                    <span class="">masahiro</span>
                  </div>
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">評価</h5>
                <div class="c-user--featureArea">
                  <p class="c-user--body">
                    🌟🌟🌟🌟🌟
                  </p>
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">タイトル</h5>
                <div class="c-user--featureArea">
                  <input type="text" name="" value="" placeholder="タイトル名を入力してください" class="c-user--input">
                </div>
              </div>
              <div class="c-user--Container">
                <h5 class="c-user--featureTitle">内容</h5>
                <div class="c-user--featureArea">
                  <textarea name="" value="" placeholder="内容を入力してください" class="c-user--text"></textarea>
                </div>
              </div>
              <div class="p-comment--button">
                  <button class="c-button--message">メッセージを送信する</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection