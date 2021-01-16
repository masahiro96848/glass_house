<header class="l-header--nav ">
  <h1 class="l-header--title u-mt_m u-ml_l ">
    <a href="" class="l-header--title">Guild Branch</a>
  </h1>
  <div class="p-menu--button u-mr_l">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="p-menu--wrap">
    <ul class="p-menu--list u-pl_0 u-mt_l u-mb_l">
    <li class="p-menu--item "><a class="p-menu--link" href="{{ route('users.index')}}">仲間を探す</a></li>
    <li class="p-menu--item "><a class="p-menu--link" href="{{ route('meeting.index')}}">テーマを探す</a></li>
      @if (Auth::check())
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('meeting.new')}}">テーマを作る</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('profile.home', ['name' => Auth::user()->name])}}">マイページ</a></li>
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