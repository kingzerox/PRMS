<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
      物理设备在线管理系统
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">公告</a>
        </li>
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             设备
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('devices.index') }}"><i class="mr-1"></i>全部设备</a>
              <a class="dropdown-item" href="{{ route('statuses.show', 1) }}"><i class="mr-1"></i>空闲</a>
              <a class="dropdown-item" href="{{ route('statuses.show', 2) }}"><i class="mr-1"></i>审核中</a>
              <a class="dropdown-item" href="{{ route('statuses.show', 3) }}"><i class="mr-1"></i>使用中</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('search.index') }}">搜索</a>
        </li>
        @can('manage_contents')
        <li class="nav-item"><a class="nav-link" href="{{ route('applies.index') }}">审核</a>
        </li>
        @endcan
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
        @can('manage_contents')
        <li class="nav-item">
            <a class="nav-link mt-1 mr-3 font-weight-bold" href="{{ route('topics.create') }}">
              <i class="fa fa-plus"></i>
            </a>
        </li>
        <li class="nav-item notification-badge">
            <a class="nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'secondary' }} text-white" href="{{ route('notifications.index') }}">
              {{ Auth::user()->notification_count }}
            </a>
          </li>
        @endcan
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @can('manage_contents')
                <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  管理后台
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('devices.create') }}">
                  <i class="fas fa-plus mr-2"></i>
                  添加设备
                </a>
                <div class="dropdown-divider"></div>
              @endcan
              <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}"><i class="far fa-user mr-2"></i>个人中心</a>
              <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}"><i class="far fa-edit mr-2"></i>编辑资料</a>
              <a class="dropdown-item" href="{{ route('users.request')}}"><i class="fas fa-key mr-2"></i>修改密码</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                  {{ csrf_field() }}
                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
              </a>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
