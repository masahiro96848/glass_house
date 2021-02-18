<header class="l-header--nav ">
  <h1 class="l-header--title u-mt_m u-ml_l ">
    @if(Auth::check())
      <a href="{{ route('users.index')}}" class="l-header--title">glass house</a>
    @else
      <a href="{{ route('home.index')}}" class="l-header--title">glass house</a>
    @endif
  </h1>
  <div class="p-menu--button u-mr_l">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="p-menu--wrap">
    <ul class="p-menu--list u-pl_0 u-mt_l u-mb_l">
    <li class="p-menu--item "><a class="p-menu--link" href="{{ route('users.index')}}">仲間を探す</a></li>
    <li class="p-menu--item "><a class="p-menu--link" href="{{ route('job.index')}}">テーマを探す</a></li>
      @if (Auth::check())
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('job.new')}}">テーマを作る</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('mypage.matching')}}">マイページ</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('profile.home', ['name' => Auth::user()->name])}}">プロフィール</a></li>
      <li class="p-menu--item ">
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="p-menu--logout">
          @csrf
            <button id="logout" type="submit" class="p-menu--link u-bg--none" onfocus="this.blur();">ログアウト</button> 
        </form>
      </li>
      @else
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('login')}}">ログイン</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('register')}}">新規登録</a></li>    
      @endif
    </ul>
  </nav>
</header>
@if (session('flash_message'))
    <div class="u-flash_message">
        {{ session('flash_message') }}
    </div>
@endif