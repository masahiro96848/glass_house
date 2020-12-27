@extends('app')

@section('title', 'メッセージ')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout">
        <h3 class="p-member--other">メッセージ</h3>
        <div class="l-container--border">
          <div class="p-comment--area">
            <div class="p-comment--left">
              <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
              <div class="p-comment--details">
                <p>
                  よろしくお願いします！！
                </p>
              </div>
            </div>
            <div class="p-comment--left">
              <img src="../img/wed.jpeg" alt="" class="c-user--image--sm">
              <div class="p-comment--details">
                <p>
                  すいません、ご返事が遅れました。
                    MASAHIROと申します。
                    12/12(土)　夜8時以降
                    12/14(月)　午後12~13時
                    12/15(月)　午後12~13時
                    が空いております。
                    よろしくお願いします。
                </p>
              </div>
            </div>
          </div>
          <div class="p-comment--form">
            <form action="">
              <textarea name="" id="" cols="30" rows="10" placeholder="メッセージを入力してください" class="p-comment--text"></textarea>
              <div class="p-comment--button">
                <button class="c-button--message">メッセージを送信する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection