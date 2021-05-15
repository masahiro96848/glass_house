@extends('app')

@section('title', $current_user->name. 'さんのマッチングリスト')

@section('content')
  @include('nav')
  <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--80">
        @include('mypage.tab')
        {{-- pc専用 --}}
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
                          @if (!isset($matching->apply->profile_image))
                            <img src="{{asset('img/no_image.jpg')}}" alt="" class="p-matching--image">
                          @else
                            <img src="{{$matching->apply->profile_image}}" alt="" class="p-matching--image">
                          @endif
                        </a>
                      </div>
                      <div class="p-matching--name">
                        <p>{{ $matching->apply->name}}</p>
                      </div>
                    </td>
                    <td class="p-matching--line">
                      <div>
                        <a href="{{ route('users.show',['name' => $matching->approve->name])}}">
                          @if (!isset($matching->approve->profile_image))
                            <img src="{{asset('img/no_image.jpg')}}" alt="" class="p-matching--image">
                          @else
                            <img src="{{$matching->approve->profile_image}}" alt="" class="p-matching--image">
                          @endif
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
                            <p class="p-matching--date">{{ str_replace("T", " ", $meeting->start_time) }}</p>
                            <p class="p-matching--zoom p-matching--width"><a href="{{ $meeting->join_url }}" class="p-matching--link" target="_blank">zoom通話</a></p>
                          </div>
                          <div>
                            <p class="p-matching--edit"><a href="{{route('meetings.edit', ['id' => $matching->id])}}" class="">日程を編集</a></p>
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
                        <p class="p-matching--message p-matching--width"><a href="{{ route('message.index', ['id' => $matching->id])}}" class="p-matching--link">メッセージ</a></p>
                      </div>
                      @if($matching->offer->status === App\Offer::STATUS[3])
                        <div>
                          <p class="p-matching--review p-matching--width"><a href="{{ route('users.new', ['id' => $matching->id])}}" class="p-matching--link">レビュー投稿</a></p>
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
        @include('mypage.sp_matching')
      </div>
    </div>
  </div>
@endsection