@extends('app')

@section('title', $current_user->name. 'さんのマッチングリスト')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--80">
        @include('mypage.tab')

        <div class="p-matching--area">
          <div class="p-matching--list">
          <table class="p-matching--table">
            <thead class="p-matching--head">
              <tr>
                <th class="p-matching--scope">申請者</th>
                <th class="p-matching--scope">承認者</th>
                <th class="p-matching--scope">日時</th>
                <th class="p-matching--scope">ステータス</th>
                <th class="p-matching--scope">ツール</th>
              </tr>
            </thead>
              @foreach($matchings as $matching)
                @if(Auth::id() === $matching->apply->id || Auth::id() === $matching->approve->id )
                <tbody class="p-matching--body">
                  <tr>
                    <td class="p-matching--line">
                      <div>
                        <a href="{{ route('users.show',['name' => $matching->apply->name])}}">
                          <img src="../img/wed.jpeg" alt=""class="c-user--image--sm" >
                        </a>
                      </div>
                      <div>
                        <p>{{ $matching->apply->name}}</p>
                      </div>
                    </td>
                    <td class="p-matching--line">
                      <div>
                        <a href="{{ route('users.show',['name' => $matching->approve->name])}}">
                          <img src="../img/wed.jpeg" alt=""class="c-user--image--sm" >
                        </a>
                      </div>
                      <div>
                        <p>{{ $matching->approve->name }}</p>
                      </div>
                    </td>
                    <td class="p-matching--line">
                      @foreach($meetings as $meeting)
                        @if($meeting->matching_id === $matching->id )
                          <div>
                            <p>{{ $meeting->start_time}}</p>
                            <a href="{{ $meeting->join_url}}"><p class="p-matching--zoom p-matching--width">zoom通話</p></a>
                          </div>
                          <div>
                            <a href="{{route('meetings.edit', ['id' => $matching->id])}}"><p>日程をを編集</p></a>
                          </div>
                        @endif
                      @endforeach
                    </td>
                    <td class="p-matching--line">
                      <div class="p-matching--status">
                        {{ $matching->offer->status}} <br>
                        <a href="{{route('offer.detail', ['id' => $matching->offer->id])}}"><p class="p-matching--offer">申請画面</p> </a>
                      </div>
                    </td>
                    <td class="p-matching--line">
                      <div>
                        <a href="{{ route('message.index', ['id' => $matching->id])}}"><p class="p-matching--message p-matching--width">メッセージ</p></a>
                      </div>
                      @if($matching->offer->status === App\Offer::STATUS[3])
                        <div>
                          <a href="{{ route('users.new', ['id' => $matching->id])}}"><p class="p-matching--review p-matching--width">レビュー投稿</p></a>
                        </div>
                      @endif
                    </td>
                  </tr>
                </tbody>
                @endif
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection