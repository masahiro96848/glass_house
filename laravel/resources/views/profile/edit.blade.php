@extends('app')

@section('title', 'プロフィールを編集する')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--wrapper--center">プロフィール編集</h2>
    </div>
    <div class="l-container--wrapper u-pt_40 u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="post" action="{{ route('profile.update')}}" enctype="">
          @csrf
          @method('PUT')
          <label for="profile_image">プロフィール画像</label><span class="c-form--any">任意</span>
            <div class="c-form--imageBox c-form--img--radius">
              <profile-img
                set-image-data='{{ $user->profile_image ?? ''}}'
                name="profile_image"
                class-object="c-form--img--radius"
              >
              </profile-img->
            </div>
          <label for="title">名前</label><span class="c-form--required">必須</span>
          <div class="c-post">
            <input type="text" class="c-form--control" placeholder="20文字以内"  name="name"   value="{{ $user->name ?? old('name')}}">
          </div>
          <label for="title">メールアドレス</label><span class="c-form--required">必須</span>
          <div class="c-post">
            <input type="text" class="c-form--control" placeholder="guild1234@○○.com"  name="email"   value="{{ $user->email ?? old('email')}}">
          </div>
          <label for="review">自己紹介</label><span class="c-form--any">任意</span>
          <div class="c-post">
            <textarea name="intro" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="200文字以内" >{{ $user->intro ?? old('intro') }}</textarea>
          </div>
          <label for="">職業カテゴリー</label><span class="c-form--required">必須(1個以上は選択してください)</span><br>
          (最高で2個まで選択できます)
          <div class="c-post p-profile--category">
            @foreach($categories as $category)
            <div class="p-profile--professional">
              <input type="checkbox" name="category[]" id="{{ $category->id }}"  value="{{ $category->id }}" {{ $category->id == old('category', $user->categories->contains('id', $category->id) ?? '') ? 'checked' : ''}}  >
              <label for="{{ $category->id }}" class="p-profile--label">
                  {{ $category->name }}
              </label>  
            </div>
            @endforeach
          </div>
          <label for="review">話のテーマ</label><span class="c-form--any">任意</span>
          <div class="c-post">
            <textarea name="talk_theme" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="「何をしたいのか」　「趣味や特技、ビジネス」など、あなたが求めるメンバーが共感する内容を書きましょう。" >{{ $user->talk_theme ?? old('talk_theme') }}</textarea>
          </div>

          <label for="review">こんな方と話したい</label><span class="c-form--any">任意</span>
          <div class="c-post">
            <textarea name="speaking" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="仕事や趣味、相談したいことを書きましょう。" >{{ $user->speaking ?? old('speaking') }}</textarea>
          </div>

            <button class="c-button c-button--submit " type="submit">編集する</button>
        </form>
      </div>
    </div>
  </div>
@endsection