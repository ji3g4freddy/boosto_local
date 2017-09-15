<!--Navbar-->
<header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('img/boosto_logo.png') }}"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="{{url('/')}}">首頁</a></li>
                <li class=""><a href="{{ url('/studio')}}">BoostO錄音室</a></li>
                <li class=""><a href="{{ url('/blog')}}">部落格</a></li>
                <li class=""><a href="{{ url('/competition')}}">合作比賽</a></li>
                <li class=""><a href="{{ url('/#service')}}">服務願景</a></li>
                <li class=""><a href="{{ url('/#contact')}}">聯絡我們</a></li>
                <li class="active"><a href="{{ url('/login') }}">會員登入</a></li>
              </ul>
            </div>
          </div>
        </nav>
</header>

