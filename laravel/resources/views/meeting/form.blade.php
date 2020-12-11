<label for="title">募集タイトル</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="どんな人を募集しますか？(例)テーマやカテゴリーに関するものなど)"  name="title"   value="">
</div>

<label for="review">内容詳細</label>
<div class="c-post">
  <textarea name="body" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="「何をしたいのか」　「趣味や特技、ビジネス」など、あなたが求めるメンバーが共感する内容を書きましょう。" >{{ $comment->body ?? old('body') }}</textarea>
</div>

<label for="tags">タグ</label>
  <div class="c-post">
  </div>


