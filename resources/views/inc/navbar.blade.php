<!--====================================================
                         MAIN NAVBAR
======================================================-->
<header class="header">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="/uploads/logos/logo-white.png" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid"></div>
                        <div class="brand-text brand-small"><img src="/uploads/logos/logo-icon.png" alt="Logo" class="img-fluid"></div>
                    </a>
                    <a id="toggle-btn" href="#" class="menu-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" ><a href="/about" class="nav-link">About</a></li>
            </ul>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <?php
                    $authUser = Auth::user();
                    $newMsgs = $authUser->messages->where('isread',0)
                ?>
                <?php $countNewMsg = count($newMsgs) ?>
                    <!-- Messages                        -->
                    <li class="nav-item dropdown"> <a id="messages" class="nav-link logout" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i>{!! $countNewMsg ? '<span class="noti-numb-bg"></span><span class="badge">'. $countNewMsg . '</span>' : '' !!}</a>
                        <ul aria-labelledby="messages" class="dropdown-menu">
                            @if($countNewMsg >0)
                                @foreach($newMsgs as $newMsg)
                                    <li>
                                        <a rel="nofollow" href="/messages/{{$newMsg->id}}" class="dropdown-item d-flex">
                                            <div class="msg-profile"> <img src="/uploads/avatars/{{ $newMsg->sender->picture }}" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="msg-body">
                                                <h3 class="h5 msg-nav-h3">{{ $newMsg->sender->first_name }}</h3>
                                                <span>{{ $newMsg->subject }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            <li><a rel="nofollow" href="/messages/" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/uploads/avatars/{{ $authUser->picture }}" alt="..." class="img-fluid rounded-circle" style="height: 30px; width: 30px;"></a>
                        <ul aria-labelledby="profile" class="dropdown-menu profile">
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="/uploads/avatars/{{ $authUser->picture }}" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">{{ $authUser->first_name }}</h3>
                                        <span>{{ $authUser->email }}</span>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            @if($authUser->hasAnyRole('Admin'))
                                <li>
                                    <a rel="nofollow" href="/admin" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-dashboard "></i>Admin Panal</div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a rel="nofollow" href="/profile/{{ $authUser->id }}" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-user "></i>My Profile</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="/messages" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-envelope-o"></i>Inbox</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="profile.html" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-cog"></i>Setting</div>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-power-off"></i>{{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>