@extends('app')

@section('title', $current_user->name. 'さんのテーマリスト')

@section('content')
  @include('nav')
    <div class="l-container--content">
    <div class="l-container--wrapper">
      <div class="l-container--layout--80">
        @include('mypage.tab')
        <div class="p-card">
          @foreach($jobs as $job)
            <div class="p-card--area">
              <div class="p-card--content">
                <div class="p-card--box p-card--box--mypage">
                  <div class="p-card--detail">
                    <a href="{{ route('meeting.show', [$job->id])}}">
                      <h4 class="p-card--title">{{ $job->title}}</h4>
                    </a>
                    @if(Auth::id() === $job->user->id)
                        <a href="{{ route('meeting.edit', ['id' => $job->id])}}">
                          <i class="p-panel--edit fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                        </a>
                        {{-- <form action="{{ route('users.delete', ['r_id' => $review->id,  'm_id' => $review->matching->id])}}" method="POST" class="p-panel--trash">
                          @csrf
                          @method('DELETE')
                          <button class="p-panel--trash--button">
                            <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                          </button>
                        </form> --}}
                      @endif
                  </div>
                  <p class="p-card--paragragh">{{ $job->summary}}</p>
                  @foreach($job->tags as $tag)
                    @if($loop->first)
                      <div class="p-card--tag">
                    @endif
                      <a href="{{ route('tag.index', ['name' => $tag->name])}}">
                        {{ $tag->hashtag }}
                      </a>
                    @if($loop->last)
                      </div>
                    @endif
                  @endforeach
                  <p class="p-card--date">{{ $job->created_at->format('Y-m-d')}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection
