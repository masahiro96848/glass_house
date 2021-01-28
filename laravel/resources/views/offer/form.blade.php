<label for="title">話すテーマ</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="どんな人を募集しますか？(例)テーマやカテゴリーに関するものなど"  name="title"   value="{{ $job->title ?? old('title')}}">
</div>

<label for="review">アジェンダ</label>
<div class="c-post">
  <textarea name="summary" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="「どんな話をしたいか「趣味や特技、ビジネス」など、あなたが求めるメンバーが共感する内容を書きましょう。" >{{ $job->summary ?? old('summary') }}</textarea>
</div>

<label for="tags">開始日時</label>
  <div class="c-post">
  </div>


