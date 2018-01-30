@extends("layouts.app")

@section("content")
    <div class="home-banner">
        @include("layouts.slide")
        <div class="login-panel">
            <svg id="loginsvg" version="1.0" xmlns="http://www.w3.org/2000/svg"
                 width="1333.000000pt" height="1074.000000pt" viewBox="0 0 1333.000000 1074.000000"
                 preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,1074.000000) scale(0.100000,-0.100000)"
                   fill="#000000" stroke="none" fill-opacity="0.8">
                    <path d="M4015 6730 l-4010 -4010 1360 -1360 1360 -1360 7000 0 7000 0 0 7000
                              0 7000 -2653 0 -2652 0 -4010 -4010z"/>
                </g>
            </svg>
            <div class="form-container">
                <form class="form-primary loginpanel" method="post" action="{!! url('/login') !!}" id="frmLogin">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content"></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Email Address" name="email">
                        @if($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <div class="square-shape">
                            <div class="shape-content"></div>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password">
                        @if($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>

                    <div class="form-group checkbox-filed">
                        <input type="checkbox" id="c1" name="remember_me">
                        <label for="c1"><span></span>remember me</label>
                        <div class="clearfix"></div>
                        {{--<input type="checkbox" id="c2" name="1c" checked>--}}
                        <a href="{!! url('/forgot-password') !!}"><span>Forgot my password</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="login-btns">
                        <a href="javascript:void(0);" class="btn-login loginbtn" id="btnLogin">
                            <div class="square-shape">
                                <div class="shape-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="svg-icon">
                                        <use xlink:href="#signin-btn"></use>
                                    </svg>
                                </div>
                            </div>
                            <span>Log In</span>
                        </a>
                        <a href="{!! url('create-account') !!}" class="btn-login signup-btn">
                            <div class="square-shape">
                                <div class="shape-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="svg-icon">
                                        <use xlink:href="#signup-btn"></use>
                                    </svg>
                                </div>
                            </div>
                            <span>Create account</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="why-special">
        <div class="wespecial-content">
            <div class="skew-right-side">
                <div class="skew-right-side-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel commodo arcu. Vestibulum at tempor erat, at suscipit odio. Praesent ut lorem placerat arcu gravida scelerisque in et nibh. Nulla maximus risus ipsum. Nulla facilisi. Donec bibendum sapien augue, at lobortis risus tristique sed. Cras in dapibus lacus, vitae iaculis ligula. Aliquam sollicitudin venenatis purus, sit amet ultrices dui eleifend ut. Phasellus commodo lorem ac augue scelerisque, quis commodo sem
                        molestie. Suspendisse egestas quam nec lacus rutrum, eu molestie tortor rutrum. Morbi vel elit sit amet orci commodo vehicula. Aenean eleifend arcu non sapien lacinia sodales. Donec semper ante vitae iaculis auctor. Nunc ultricies efficitur finibus.</p>
                    <div class="clearfix"></div>
                    <p>Nulla facilisi. Nunc nisi eros, bibendum ac finibus non, elementum in neque. Duis sed fringilla quam. In elementum scelerisque diam at accumsan. Praesent ipsum lectus, tincidunt a lectus ut, malesuada molestie sapien. Nunc in nisi malesuada, suscipit libero ac, malesuada nisi. Nam eros lacus, elementum quis enim mattis, rutrum pretium lorem. Fusce sit amet sem vitae nulla tincidunt dapibus. Nulla placerat rutrum lorem sit amet volutpat. Suspendisse fringilla, purus ac
                        pretium aliquam, lectus purus rhoncus metus, non dictum orci arcu et dui. Fusce aliquet, dui eget ullamcorper ornare, nulla magna dictum lectus, non dignissim nulla nunc sed orci. Aliquam purus augue, dignissim tincidunt ex a, tincidunt facilisis arcu. Cras tincidunt efficitur libero non aliquet.</p>
                    <p>Sed faucibus nec turpis at pharetra. Vivamus at augue cursus, ultrices enim sit amet, sollicitudin sem. Maecenas sed placerat tortor. Aenean sed sem sed nunc mollis cond imentum sit amet vitae purus. Cras commodo ligula eu risus condimentum, a sollicitudin magna commodo. In tempor sit amet leo non lobortis. Cras enim ex, convallis id rhoncus eget, interdum a nibh. Fusce vitae ante vel libero varius rutrum. </p>
                </div>
            </div>
        </div>
        <div class="wespecial-img">
            <div class="primary-heading">
                <h1>Why we are <strong>Special</strong></h1>
                <div class="skew-left-side"></div>
            </div>
            <div class="skew-left-side">
                <div class="skew-left-side-content">
                    <img src="/img/img-05.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="how-we-work">
        <div class="primary-heading">
            <div class="skew-left-side"></div>
            <h1>How <strong>we work</strong></h1>
        </div>

        <div class="clearfix"></div>
        <div class="how-we-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" data-toggle="tab" href="#step01" role="tab">
                        <div class="step-tab">
                            <h4><strong>Step 1</strong><span>Create an account</span></h4>
                        </div><!--step-tab-->
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#home-icon"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#step02" role="tab">
                        <div class="step-tab">
                            <h4><strong>Step 2</strong><span>Manage your fleet</span></h4>
                        </div>
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#folder-icon"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#step03" role="tab">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#calendar-icon"/>
                                </svg>
                            </div>
                        </div>
                        <div class="step-tab">
                            <h4><strong>Step 3</strong><span>Update your fleet availability</span></h4>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#step04" role="tab">
                        <div class="square-shape">
                            <div class="shape-content">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                                    <use xlink:href="#money-icon"/>
                                </svg>
                            </div>
                        </div>
                        <div class="step-tab">
                            <h4><strong>Step 4</strong><span>Have your fleet hired</span></h4>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="step01" role="tabpanel">
                    <div class="step-detail">
                        <h2>Step 1</h2>
                        <div class="slurve card" data-slurve="0,0 0,0 80,0 0,0" data-slurve-classes="slurve-style-5"><h2>Create an account</h2></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel commodo arcu. Vestibulum at tempor erat, at suscipit odio. Praesent ut lorem placerat arcu gravida scelerisque in et nibh. Nulla maximus risus ipsum. Nulla facilisi. Donec bibendum sapien augue, at lobortis risus tristique sed. Cras in dapibus lacus, vitae iaculis ligula. Aliquam sollicitudin venenatis purus, sit amet ultrices dui eleifend ut. Phasellus commodo lorem ac augue scelerisque, quis commodo sem
                            molestie. Suspendisse egestas quam nec lacus rutrum, eu molestie tortor rutrum. Morbi vel elit sit amet orci commodo vehicula. Aenean eleifend arcu non sapien lacinia sodales. Donec semper ante vitae iaculis auctor. Nunc ultricies efficitur finibus.</p>
                        <p>Nulla facilisi. Nunc nisi eros, bibendum ac finibus non, elementum in neque. Duis sed fringilla quam. In elementum scelerisque diam at accumsan. Praesent ipsum lectus, tincidunt a lectus.</p>
                    </div>
                </div>
                <div class="tab-pane" id="step02" role="tabpanel">
                    <div class="step-detail">
                        <h2>Step 2</h2>
                        <div class="slurve card" data-slurve="0,0 0,0 80,0 0,0" data-slurve-classes="slurve-style-5"><h2>Manage your fleet</h2></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel commodo arcu. Vestibulum at tempor erat, at suscipit odio. Praesent ut lorem placerat arcu gravida scelerisque in et nibh. Nulla maximus risus ipsum. Nulla facilisi. Donec bibendum sapien augue, at lobortis risus tristique sed. Cras in dapibus lacus, vitae iaculis ligula. Aliquam sollicitudin venenatis purus, sit amet ultrices dui eleifend ut. Phasellus commodo lorem ac augue scelerisque, quis commodo sem
                            molestie. Suspendisse egestas quam nec lacus rutrum, eu molestie tortor rutrum. Morbi vel elit sit amet orci commodo vehicula. Aenean eleifend arcu non sapien lacinia sodales. Donec semper ante vitae iaculis auctor. Nunc ultricies efficitur finibus.</p>
                        <p>Nulla facilisi. Nunc nisi eros, bibendum ac finibus non, elementum in neque. Duis sed fringilla quam. In elementum scelerisque diam at accumsan. Praesent ipsum lectus, tincidunt a lectus.</p>
                    </div>
                </div>
                <div class="tab-pane" id="step03" role="tabpanel">
                    <div class="step-detail">
                        <h2>Step 3</h2>
                        <div class="slurve card" data-slurve="0,0 0,0 80,0 0,0" data-slurve-classes="slurve-style-5"><h2>Update your fleet availability</h2></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel commodo arcu. Vestibulum at tempor erat, at suscipit odio. Praesent ut lorem placerat arcu gravida scelerisque in et nibh. Nulla maximus risus ipsum. Nulla facilisi. Donec bibendum sapien augue, at lobortis risus tristique sed. Cras in dapibus lacus, vitae iaculis ligula. Aliquam sollicitudin venenatis purus, sit amet ultrices dui eleifend ut. Phasellus commodo lorem ac augue scelerisque, quis commodo sem
                            molestie. Suspendisse egestas quam nec lacus rutrum, eu molestie tortor rutrum. Morbi vel elit sit amet orci commodo vehicula. Aenean eleifend arcu non sapien lacinia sodales. Donec semper ante vitae iaculis auctor. Nunc ultricies efficitur finibus.</p>
                        <p>Nulla facilisi. Nunc nisi eros, bibendum ac finibus non, elementum in neque. Duis sed fringilla quam. In elementum scelerisque diam at accumsan. Praesent ipsum lectus, tincidunt a lectus.</p>
                    </div>
                </div>
                <div class="tab-pane" id="step04" role="tabpanel">
                    <div class="step-detail">
                        <h2>Step 4</h2>
                        <div class="slurve card" data-slurve="0,0 0,0 80,0 0,0" data-slurve-classes="slurve-style-5"><h2>Have your fleet hired</h2></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel commodo arcu. Vestibulum at tempor erat, at suscipit odio. Praesent ut lorem placerat arcu gravida scelerisque in et nibh. Nulla maximus risus ipsum. Nulla facilisi. Donec bibendum sapien augue, at lobortis risus tristique sed. Cras in dapibus lacus, vitae iaculis ligula. Aliquam sollicitudin venenatis purus, sit amet ultrices dui eleifend ut. Phasellus commodo lorem ac augue scelerisque, quis commodo sem
                            molestie. Suspendisse egestas quam nec lacus rutrum, eu molestie tortor rutrum. Morbi vel elit sit amet orci commodo vehicula. Aenean eleifend arcu non sapien lacinia sodales. Donec semper ante vitae iaculis auctor. Nunc ultricies efficitur finibus.</p>
                        <p>Nulla facilisi. Nunc nisi eros, bibendum ac finibus non, elementum in neque. Duis sed fringilla quam. In elementum scelerisque diam at accumsan. Praesent ipsum lectus, tincidunt a lectus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection