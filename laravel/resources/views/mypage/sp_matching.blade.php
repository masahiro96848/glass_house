<div class="p-matching--area__sp">
  <div class="p-matching--list__sp">
    @foreach($matchings as $matching)
    <div class="p-matching--content">
        <div class="p-matching--top">
          <p>申請者</p>
          <p>承認者</p>
        </div>
        <div class="p-matching--match">
          @if(Auth::id() === $matching->apply->id || Auth::id() === $matching->approve->id )
            <div class="p-matching--applicant">
              <a href="{{ route('users.show',['name' => $matching->apply->name])}}">
                @if (!isset($matching->apply->profile_image))
                  <img src="{{asset('img/no_image.jpg')}}" alt="" class="p-matching--image">
                @else
                  <img src="{{$matching->apply->profile_image}}" alt="" class="p-matching--image">
                @endif
              </a>
              <div class="p-matching--name">
              <p>{{ $matching->apply->name}}</p>
            </div>
            </div>
          @endif
          <div class="p-matching--authorizer">
            <a href="{{ route('users.show',['name' => $matching->approve->name])}}">
                @if (!isset($matching->approve->profile_image))
                  <img src="{{asset('img/no_image.jpg')}}" alt="" class="p-matching--image">
                @else
                  <img src="{{$matching->approve->profile_image}}" alt="" class="p-matching--image">
                @endif
              </a>
              <div class="p-matching--name">
                <p>{{ $matching->approve->name }}</p>
              </div>
          </div>
        </div>
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
        <div class="p-matching--status">
          {{ $matching->offer->status}} <br>
          <a href="{{route('offer.detail', ['id' => $matching->offer->id])}}"><p class="p-matching--offer">申請画面</p> </a>
        </div>

        <div>
          <p class="p-matching--message p-matching--width"><a href="{{ route('message.index', ['id' => $matching->id])}}" class="p-matching--link">メッセージ</a></p>
        </div>
        @if($matching->offer->status === App\Offer::STATUS[3])
          <div>
            <p class="p-matching--review p-matching--width"><a href="{{ route('users.new', ['id' => $matching->id])}}" class="p-matching--link">レビュー投稿</a></p>
          </div>
        @endif
      </div>
      @endforeach
  </div>
</div>











              

              



              