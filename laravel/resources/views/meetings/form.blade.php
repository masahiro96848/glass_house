<label for="title">トピック</label>
<div class="c-post">
  <input type="text" class="c-form--control" placeholder="タイトル名"  name="topic"   value="{{ $meeting->topic ?? old('topic')}}">
</div>

<label for="review">アジェンダ</label>
<div class="c-post">
  <textarea name="agenda" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="話すテーマや話したいことを書きましょう。" >{{ $meeting->agenda ?? old('agenda') }}</textarea>
</div>

<label for="review">開始時間</label>
<div class="c-post">
  <input type="datetime-local" name="start_time" class="" id="start_time" value="{{ $meeting->start_time ?? old('start_time', date('Y-m-d'))}}">
</div>