<label for="title">タイトル</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="タイトル名"  name="title"   value="{{ $job->title ?? old('title')}}">
</div>

<label for="review">アジェンダ</label>
<div class="c-post">
  <textarea name="summary" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="話すテーマや話したいことを書きましょう。" >{{ $job->summary ?? old('summary') }}</textarea>
</div>


  </div>