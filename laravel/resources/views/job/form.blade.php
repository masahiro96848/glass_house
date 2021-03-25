<label for="title">タイトル</label><span class="c-form--required">必須</span>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="話してみたい人、業界、業種などを入れて書きましょう。(50文字以内)"  name="title"   value="{{ $job->title ?? old('title')}}">
</div>

<label for="review">内容詳細</label><span class="c-form--required">必須</span>
<div class="c-post">
  <textarea name="summary" cols="30" rows="10" class="c-form--control" placeholder="お仕事のお話や相手が求めている内容を書いてみましょう。(500文字以内)" >{{ $job->summary ?? old('summary') }}</textarea>
</div>

<label for="tags">タグ</label><span class="c-form--any">任意</span>
  <div class="c-post">
    <job-tags-input
      :autocomplete-items='@json($allTagNames ?? [])'
      :initial-tags='@json($tagNames ?? [])'
    >

    </job-tags-input>
  </div>


