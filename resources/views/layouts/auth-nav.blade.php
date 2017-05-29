<ul class="nav navbar-nav float-sm-right">
<!-- Admin Nav Link -->
    @if(!Auth::guest())
        @if(Auth::user()->role_id == '2')
            <li class="nav-item"><a class="nav-item nav-link" href="{{ url('/admin') }}">Admin</a></li>
        @endif
    @endif
<!-- Authentication Links -->
    @if (Auth::guest())
        <li class="nav-item"><a class="nav-item nav-link" href="{{ url('/login') }}">Login</a></li>
        <!--li class="nav-item"><a class="ce--button-signup nav-item nav-link btn btn-primary" href="{{ url('/register') }}">Register</a></li-->
    @else
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="logindropdown">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu" role="menu" aria-labelledby = "logindropdown">
                    <a class="dropdown-item" href="{{url('/profile')}}">My Account</a>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class = "dropdown-item">
                        Logout
                    </a>
            </div>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
        </div>
    @endif
</ul>

<script type="text/javascript">
    $('.dropdown-toggle').dropdown();
</script>
