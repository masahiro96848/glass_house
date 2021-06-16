<div class="l-container--searchArea">
  <div class="p-search--select">
    <form action="{{route('users.index')}}" method="GET">
      <div class="p-search--form">
        <div class="p-search--area">
          <p class="p-search--title">ユーザー名</p>
            <input name="keyword" id="" class="c-form--control c-form--control--name" placeholder="キーワード検索" value="{{ $params['keyword'] ?? null}}">
        </div>
        <div class="p-search--area">
          <p class="p-search--title">レビュー数</p>
            <select name="review" id="reviewed_id" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
              <option value="asc">多い順</option>
              <option value="desc">少ない順</option>
            </select>
        </div>
        <div class="p-search--area">
          <p class="p-search--title">いいね</p>
            <select name="like" id="" class="c-form--control c-form--control--select">
              <option value="">選択してください</option>
            </select>
        </div>
        <div class="p-search--area">
          <p class="p-search--title">作成日</p>
            <select name="date" id="" class="c-form--control c-form--control--select" value="">
              <option value="">選択してください</option>
              <option value="asc">新しい順</option>
              <option value="desc">古い順</option>
            </select>
        </div>
          <button class="c-button c-button--submit c-button--submit--search " type="submit">検索</button>
      </div>
    </form>
  </div>

