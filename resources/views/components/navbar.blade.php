<nav class="navbar navbar-default nav-links navbar-fixed-top">
    <div class="container-fluid">
        <a class="mini-navbar navbar-brand" href="/">
            hello
        </a>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::guest())
                            <i class="fa fa-user" ></i>
                            <span class="caret"></span>
                        @else
                            <img id="thumbnail" class="img-circle" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                        @endif
                    
                </a>
                <ul class="dropdown-menu">
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                            <li><a href="#">{{ Auth::user()->name }}</a></li>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>