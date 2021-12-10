<header class="header">

    <div class="navigation-wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-top navbar-expand-lg navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-css navbar-menu-toggler collapsed" type="button"
                    data-toggle="collapse" data-target="#navbar-bottom-collapsible"
                    aria-controls="navbar-bottom-collapsible" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('front_files/img/logo.png') }}" height="20" alt="">
                </a>
                <button class="navbar-toggler navbar-toggler-css-reverse navbar-menu-toggler collapsed" type="button"
                    data-toggle="collapse" data-target="#navbar-top-collapsible" aria-controls="navbar-top-collapsible"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-top-collapsible">
                    <form class="navbar-search" method="GET" action="{{ route('search') }}">
                        <div class="input-group input-group-btn-inside">
                            <input type="search" class="form-control" name="search" placeholder="Search...">
                            <div class="">
                                <button class="btn btn-light btn-merge btn-icon" type="submit">
                                    <svg id="lnr-magnifier" viewBox="0 0 1024 1024">
                                        <path class="path1"
                                            d="M966.070 981.101l-304.302-331.965c68.573-71.754 106.232-165.549 106.232-265.136 0-102.57-39.942-199-112.47-271.53s-168.96-112.47-271.53-112.47-199 39.942-271.53 112.47-112.47 168.96-112.47 271.53 39.942 199.002 112.47 271.53 168.96 112.47 271.53 112.47c88.362 0 172.152-29.667 240.043-84.248l304.285 331.947c5.050 5.507 11.954 8.301 18.878 8.301 6.179 0 12.378-2.226 17.293-6.728 10.421-9.555 11.126-25.749 1.571-36.171zM51.2 384c0-183.506 149.294-332.8 332.8-332.8s332.8 149.294 332.8 332.8-149.294 332.8-332.8 332.8-332.8-149.294-332.8-332.8z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <!-- / Navigation -->

        <!-- Horizontal Menu -->
        <nav class="navbar navbar-bottom navbar-expand-lg navbar-dark">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbar-bottom-collapsible">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            @if(Session::get('page') == "home")
                            @php
                            $active = "active";
                            @endphp
                            @else
                            @php
                            $active = "";
                            @endphp
                            @endif
                            <a href="{{ route('home') }}" class="nav-link {{ $active }}">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span>Ongoing</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(Session::get('page') == "list")
                            @php
                            $active = "active";
                            @endphp
                            @else
                            @php
                            $active = "";
                            @endphp
                            @endif
                            <a href="{{ route('anime.list') }}" class="nav-link {{ $active }}">
                                <span>Anime List</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown " id="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Genre
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg-left"
                                style="width: 720px; font-size: 14px !important;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="dropdown-item">
                                            <span>TV Series</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Movies</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>OVAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>ONAs</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span>Specials</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="nav-item dropdown " id="dropdown">
                            @if(Session::get('page') == "type")
                            @php
                            $active = "active";
                            @endphp
                            @else
                            @php
                            $active = "";
                            @endphp
                            @endif
                            <a class="nav-link dropdown-toggle {{ $active }}" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Types
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <a href="{{ route('anime.type', ['type'=>'tv series']) }}" class="dropdown-item">
                                    <span>TV Series</span>
                                </a>
                                <a href="{{ route('anime.type', ['type'=>'movie']) }}" class="dropdown-item">
                                    <span>Movies</span>
                                </a>
                                <a href="{{ route('anime.type', ['type'=>'ova']) }}" class="dropdown-item">
                                    <span>OVAs</span>
                                </a>
                                <a href="{{ route('anime.type', ['type'=>'ona']) }}" class="dropdown-item">
                                    <span>ONAs</span>
                                </a>
                                <a href="{{ route('anime.type', ['type'=>'special']) }}" class="dropdown-item">
                                    <span>Specials</span>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            @if(Session::get('page') == "dub")
                            @php
                            $active = "active";
                            @endphp
                            @else
                            @php
                            $active = "";
                            @endphp
                            @endif
                            <a href="{{ route('anime.dub') }}" class="nav-link {{ $active }}">
                                <span>Dubbed</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- / Horizontal Menu -->

        <!-- Header Navigation Toolbar -->
        <nav class="navbar navbar-toolbar navbar-expand-lg navbar-dark">
            <div class="container">
                <ul class="navbar-nav navbar-menu-primary">
                    <li class="nav-item dropdown notifications-nav-item">
                        <a href="#" class="nav-link dropdown-toggle dropdown-nocaret position-relative" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg fill="#ffffff" width="22" height="22" id="lnr-alarm" viewBox="0 0 1024 1024">
                                <path class="path1"
                                    d="M860.171 773.15c-58.576-44-92.171-111.194-92.171-184.35v-153.6c0-128.661-86.733-237.442-204.798-270.954l-0.002-36.246c0-42.347-34.451-76.8-76.8-76.8-42.347 0-76.8 34.453-76.8 76.8v36.245c-118.067 33.512-204.8 142.294-204.8 270.955v153.6c0 73.157-33.595 140.349-92.171 184.35-8.808 6.616-12.395 18.125-8.907 28.573 3.486 10.448 13.267 17.496 24.283 17.496h232.982c-1.709 8.384-2.587 16.955-2.587 25.581 0 70.579 57.421 128 128 128s128-57.421 128-128c0-8.626-0.878-17.197-2.584-25.581h232.981c11.016 0 20.795-7.046 24.283-17.496s-0.101-21.957-8.909-28.573zM460.8 128c0-14.115 11.485-25.6 25.6-25.6s25.6 11.485 25.6 25.6v26.774c-8.435-0.763-16.97-1.176-25.6-1.176s-17.166 0.413-25.6 1.176v-26.774zM563.2 844.8c0 42.347-34.453 76.8-76.8 76.8s-76.8-34.453-76.8-76.8c0-8.76 1.515-17.411 4.394-25.581h144.813c2.878 8.168 4.394 16.821 4.394 25.581zM191.571 768.019c13.075-15.826 24.437-33.051 33.744-51.27 20.362-39.858 30.685-82.906 30.685-127.949v-153.6c0-127.043 103.357-230.4 230.4-230.4s230.4 103.357 230.4 230.4v153.6c0 45.043 10.323 88.091 30.685 127.949 9.307 18.219 20.669 35.445 33.744 51.27h-589.658z">
                                </path>
                            </svg>
                            <span class="color-badge bg-light position-absolute"
                                style="top: 1.3rem; right: .7rem;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-sm dropdown-menu-left">

                            <div class="notifications-box">

                                <small class="d-block mt-3"
                                    style="margin-left: 30px; font-weight: 500; color: #999;">Today</small>

                                <ul class="list-group list-group-notifications-2">
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">KB</span>
                                            <span class="badge badge-secondary color-badge badge-size-1"></span>
                                        </div>
                                        <div class="item-info">
                                            <p><a href="#">Keon Boyer</a> sent you a new message.</p>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">RA</span>
                                            <span class="badge badge-success color-badge badge-size-1"></span>
                                        </div>
                                        <div class="item-info">
                                            <p><a href="#">Roger Aniston</a> started following you.</p>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>

                                </ul>

                                <small class="d-block mt-3"
                                    style="margin-left: 30px; font-weight: 500; color: #999;">Yesterday</small>

                                <ul class="list-group list-group-notifications-2">
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">
                                                <i class="fas fa-comments"></i>
                                            </span>
                                        </div>
                                        <div class="item-info">
                                            <a href="#">You have 43 new comments.</a>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">LG</span>
                                            <span class="badge badge-secondary color-badge badge-size-1"></span>
                                        </div>
                                        <div class="item-info">
                                            <p><a href="#">Leone Gutkowski</a> started following you.</p>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">SR</span>
                                            <span class="badge badge-success color-badge badge-size-1"></span>
                                        </div>
                                        <div class="item-info">
                                            <p><a href="#">Sterling Robel</a> sent you a new message.</p>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>

                                </ul>

                                <small class="d-block mt-3" style="margin-left: 30px; font-weight: 500; color: #999;">5
                                    days ago</small>

                                <ul class="list-group list-group-notifications-2">
                                    <li class="list-group-item">
                                        <div class="user-avatar">
                                            <span class="avatar avatar-1 rounded-circle">
                                                <i class="fas fa-shopping-bag"></i>
                                            </span>
                                        </div>
                                        <div class="item-info">
                                            <a href="#">You have 2 new orders waiting.</a>
                                        </div>
                                        <div class="timestamp">19:45</div>
                                    </li>
                                    <li class="list-group-item mt-3 list-group-loader">
                                        <a href="#" class="btn btn-ellipsis-loader">
                                            <div class="lds-ellipsis">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </li>
                    <li class="nav-item nav-user-dropdown dropdown">
                        <a href="#" class="nav-link dropdown-toggle dropdown-nocaret" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://avatars.dicebear.com/api/bottts/avatar.svg"
                                class="avatar avatar-1 rounded-circle" alt="Avatar image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-sm dropdown-menu-left">
                            <div class="dropdown-header pt-0">
                                <small class="text-overflow m-0">Welcome</small>
                            </div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- / Header Navigation Toolbar -->

    </div>

</header>
