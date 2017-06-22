<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/posts') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        BoostO錄音室管理
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li></li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">錄音室
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('posts') }}">我的錄音室</a></li>
                            <li><a href="{{ URL::to('posts/create') }}">建立錄音室</a></li>
                        </ul>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">部落格
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('articles') }}">我的文章</a></li>
                        <li><a href="{{ URL::to('articles/create') }}">建立文章</a></li>
                        </ul>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">合作比賽
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('contests') }}">比賽總覽</a></li>
                            <li><a href="{{ URL::to('contests/create') }}">建立比賽</a></li>
                        </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::to('/') }}">返回BoostO網站</a></li>    <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">登入</a></li>
                            <li><a href="{{ route('register') }}">註冊</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            登出
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>