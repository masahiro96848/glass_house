<div class="p-card--tabArea">
  <ul class="p-card--tab">
    <li class="p-card--button {{ Request::routeIs('mypage.matching') ? 'p-card--tab__active' : ''}}"><a href="{{ route('mypage.matching')}}">マッチングリスト</a></li>
    <li class="p-card--button {{ Request::routeIs('mypage.job') ? 'p-card--tab__active' : ''}}"><a href="{{ route('mypage.job')}}">トークテーマ</a></li>
    <li class="p-card--button {{ Request::routeIs('mypage.liking') ? 'p-card--tab__active' : ''}}"><a href="{{ route('mypage.liking')}}">気になるリスト</a></li>
    <li class="p-card--button {{ Request::routeIs('mypage.liked') ? 'p-card--tab__active' : ''}}"><a href="{{ route('mypage.liked')}}">あなたと話してみたいリスト</a></li>
  </ul>
</div>


{{-- <div class="p-card--tabArea">
  <div class="p-card--tab">
    <a href="{{ route('mypage.matching')}}"><p class="p-card--button">マッチングリスト</p></a>
  </div>
  <div class="p-card--tab">
    <a href="{{ route('mypage.liking')}}"><p class="p-card--button">気になるリスト</p></a>
  </div>
  <div class="p-card--tab">
    <a href="{{ route('mypage.liked')}}"><p class="p-card--button">あなたと話してみたいリスト</p></a>
  </div>
  <div class="p-card--tab u-mr_0">
    <a href="{{ route('mypage.job')}}"><p class="p-card--button">トークテーマリスト</p></a>
  </div>
</div> --}}