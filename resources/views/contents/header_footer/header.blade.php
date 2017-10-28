@if(!Auth::guest())
    @if( Request::route()->getName() == 'profile' )
        @include('contents.header_footer.includes.navbar_left')
    @endif
@endif

<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar {{ \Request::is('login') || \Request::is('register') || auth()->user() == null ? '' : 'navbar-bg' }}">
    <div class="container">
    
        @if(!Auth::guest())
            @if( Request::route()->getName() == 'profile' )
                <div class="float-left mb-1 mr-3" data-toggle="tooltip" data-placement="bottom" title="Write a post | Upload media">
                    <a href="#" data-activates="slide-out" class="button-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                </div>
            @endif
        @endif

        <a class="navbar-brand" href="/"><strong>{{ config('app.name') }}</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    @if(!Auth::guest())
                        <li class="nav-item {{ Request::route()->getName() == 'home' ? 'active' : ''}}">
                            <a class="nav-link" href="/" data-toggle="tooltip" data-placement="bottom" title="Home">
                                <i class="fa fa-home fa-fw font-icon-header header-icon"></i>
                                <span class="navbar-menu-title">Home</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::route()->getName() == 'friend.requests' ? 'active' : ''}}">
                            <a class="nav-link" href="/" data-toggle="tooltip" data-placement="bottom" title="Friends Request">
                                <i class="fa fa-user-plus fa-fw font-icon-header header-icon"></i>
                                <span class="navbar-menu-title" style="display: none;">Friend Requests</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::route()->getName() == 'messages' ? 'active' : ''}}">
                            <a class="nav-link" href="/" data-toggle="tooltip" data-placement="bottom" title="Messages">
                                <i class="fa fa-envelope fa-fw font-icon-header header-icon"></i>
                                <span class="navbar-menu-title" style="display: none;">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::route()->getName() == 'notification' ? 'active' : ''}}">
                            <a class="nav-link" href="/" data-toggle="tooltip" data-placement="bottom" title="Notifications">
                                <i class="fa fa-bell fa-fw font-icon-header header-icon"></i>
                                <span class="navbar-menu-title" style="display: none;">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-profile-menu dropdown {{ Request::route()->getName() == 'profile' ? 'active' : ''}}">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{auth()->user()->avatar}}" class="img-fluid rounded-circle z-depth-0 header-avatar-img" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                <span class="navbar-menu-title" style="display: none;"> {{Auth::user()->fullname}}</span>
                            </a>
                             
                            <div class="dropdown-menu dropdown-success" aria-labelledby="navbarDropdownMenuLink">
                                <div class="media mt-1">
                                    <a href="/{{Auth::user()->username}}" class="px-0">
                                        <div class="media-left view overlay hm-white-sligh">
                                            <img class="d-flex align-self-center mr-3 avatar-header-dropdown-img img-fluid rounded-circle z-depth-0 border" src="{{auth()->user()->avatar}}"/>
                                            <div class="mask waves-effect waves-light"></div>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <span class="mt-0 media-heading text-submit-color h5 text-name-header text-ellipsis" data-toggle="tooltip" data-placement="bottom" title="{{Auth::user()->fullname}}">{{Auth::user()->fullname}}</span>
                                        <span class="text-submit-color font-italic"><span>@</span>{{Auth::user()->username}}</span>
                                        <a href="/{{Auth::user()->username}}" class="px-0">
                                            <button class="btn btn-cus-submit">
                                                <i class="fa fa-user fa-fw mr-1"></i>Profile
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="divider-custom mt-2 mb-2"></div>
                                <div class="media-bottom-aaditional">
                                    <a href="/" class="px-0">
                                        <button class="btn btn-cus-common">
                                            <i class="fa fa-gear fa-fw mr-1"></i>Setting
                                        </button>
                                    </a>
                                    <a href="{{ route('logout') }}" class="px-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <button class="btn btn-cus-dismiss">
                                            <i class="fa fa-sign-out fa-fw mr-1"></i>Logout
                                        </button>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
    </div>
</nav>
