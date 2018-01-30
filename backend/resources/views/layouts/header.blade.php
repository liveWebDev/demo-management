<header>
    <div class="header-container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="268.5 0 1386 1080" class="svg-icon">
                            <use xlink:href="#logo"></use>
                        </svg>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{!! url('/') !!}">Home</a></li>
                        <li><a href="javascript:void(0);">About Us</a></li>
                        <li><a href="{!! url('/faqs') !!}">Faq’s</a></li>
                        <li><a href="{!! url('/contact') !!}">Contact</a></li>
                        @if(Auth::check())
                            <li class="login-btn"><a href="{!! url('/logout') !!}">Logout</a></li>
                        @else
                            <li class="login-btn"><a href="{!! url('/login') !!}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>