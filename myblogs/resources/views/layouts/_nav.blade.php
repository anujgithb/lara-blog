<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Home') }}
                </a>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? "active" : "" }} ">
                    <a class="nav-link" href="{{ url('/')}}">Home
                    <span class="sr-only">(current)</span>
                    </a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? "active" : "" }} ">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item {{ Request::is('blog') ? "active" : "" }} ">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? "active" : "" }} ">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>

                </ul>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                                <li><a href="{{ route('category.index') }}">Categories</a></li>
                                <li><a href="{{ route('tags.index') }}">Tags</a></li>

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
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>