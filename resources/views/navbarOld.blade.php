<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-3-strong">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <!-- Navbar brand -->

        <div>
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ url('/assets/images/logo.png') }}" height="35" alt="BLAWG" loading="lazy" />
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-center mx-5" id="navbarSupportedContent">

            <!-- Left links -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/homepage">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">pay me</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements Not Logged In-->
        <div class="d-flex align-items-center">

            @auth
                <div class="d-flex align-items-center">
                    {{-- <a href="#" class="text-dark mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a> --}}
                    {{-- <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span> --}}
                    {{-- Hello, <a href="/profile/{{auth()->user()->username}}" class="mr-2">{{auth()->user()->username}}</a> --}}

                    <!-- Profile thingy -->
                    <div class="dropdown me-3">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow hover-zoom border border-1 rounded border-primary border-opacity-25"
                            href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ url('/assets/images/avatar2.png') }}" class="rounded" height="30"
                                alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="/profile/{{ auth()->user()->username }}">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Profile thingy end-->

                    <a class="btn" href="/create-post">Post</a>
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button class="btn me-2">Sign Out</button>
                    </form>
                    {{-- button alternative ::::: btn-outline-dark btn-rounded me-5 --}}
                @else
                    <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                                <input name="loginusername" class="form-control form-control-sm input-dark rounded-5"
                                    type="text" placeholder="Username" autocomplete="off" />
                            </div>
                            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                                <input name="loginpassword" class="form-control form-control-sm input-dark rounded-5"
                                    type="password" placeholder="Password" />
                            </div>
                            <div class="col-md-auto">
                                <button class="btn">Sign In</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-auto me-2">
                        <a href="/register">
                            <button type="submit" class="btn">Register</button>
                        </a>
                    </div>
                @endauth
            </div>
            <!-- Right not logged in elements -->

            <!-- Container wrapper -->
</nav>
