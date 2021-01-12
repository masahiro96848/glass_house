<label for="title">募集タイトル</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="どんな人を募集しますか？(例)テーマやカテゴリーに関するものなど"  name="title"   value="{{ $job->title ?? old('title')}}">
</div>

<label for="review">内容詳細</label>
<div class="c-post">
  <textarea name="summary" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="「何をしたいのか」　「趣味や特技、ビジネス」など、あなたが求めるメンバーが共感する内容を書きましょう。" >{{ $job->summary ?? old('summary') }}</textarea>
</div>

<label for="tags">タグ</label>
  <div class="c-post">
    <job-tags-input
      :autocomplete-items='@json($allTagNames ?? [])'
    >

    </job-tags-input>
  </div>


