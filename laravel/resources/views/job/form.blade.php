<label for="title">タイトル</label><span class="c-form--required">必須</span>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="どんな人を募集しますか？(例)テーマやカテゴリーに関するものなど"  name="title"   value="{{ $job->title ?? old('title')}}">
</div>

<label for="review">内容詳細</label><span class="c-form--required">必須</span>
<div class="c-post">
  <textarea name="summary" cols="30" rows="10" class="c-form--control" placeholder="どんな話をしたいか,趣味や特技、ビジネスなど、あなたが求めるメンバーが共感する内容を書きましょう。" >{{ $job->summary ?? old('summary') }}</textarea>
</div>

<label for="tags">タグ</label><span class="c-form--any">任意</span>
  <div class="c-post">
    <job-tags-input
      :autocomplete-items='@json($allTagNames ?? [])'
      :initial-tags='@json($tagNames ?? [])'
    >

    </job-tags-input>
  </div>


