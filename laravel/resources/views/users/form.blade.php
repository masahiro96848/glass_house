<div class="c-user--Container">
  <h5 class="c-user--featureTitle">ユーザー名</h5>
    <div class="c-user--featureArea">
      <div class="c-user">
        <img src="/img/wed.jpeg" alt=""class="c-user--image--sm" >
        @if($current_user !== $matching->apply_id && $matching->approve_id)
          <span class="">{{ $matching->apply->name}}</span>
        @else 
          <span class="">{{ $matching->approve->name}}</span>
        @endif
      </div>
    </div>
  </div>
  <div class="c-user--Container">
    <p class="c-user--featureTitle">評価<span class="c-form--required c-form--required--review">必須</span></p>
    <div class="c-user--featureArea">
      <p class="c-user--body">
        <comment-star
          rating={{ $review->star ?? old('star')}}
        >

        </comment-star>
      </p>
    </div><br>
  </div>
  <div class="c-user--Container">
    <p class="c-user--featureTitle">タイトル<span class="c-form--required c-form--required--review">必須</span></p><br>
    <div class="c-user--featureArea">
      <input type="text" name="title" value="{{ $review->title ?? old('title')}}" placeholder="タイトル名を入力してください" class="c-user--input">
    </div>
  </div>
  <div class="c-user--Container">
    <p class="c-user--featureTitle">内容<span class="c-form--required c-form--required--review">必須</span></p>
    <div class="c-user--featureArea">
      <textarea name="body" value="" placeholder="内容を入力してください" class="c-user--text">{{ $review->body ?? old('body')}}</textarea>
    </div>
  </div>
  <div class="p-comment--button">
      <button class="c-button--message">レビューを投稿する</button>
  </div>