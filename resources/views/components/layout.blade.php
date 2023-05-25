<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Blawg</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" phpcrossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

    <!-- Font for logo deuhreuh -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Annie+Use+Your+Telescope&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Annie+Use+Your+Telescope&family=Playfair:wght@300&display=swap"
        rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

</head>


<body class="d-flex flex-column" style="min-height: 100vh">
    <!-- Navbar -->

    <nav class="navbar navbar-expand-sm bg-white shadow-4 mx-5">
        <div class="container-fluid d-flex justify-content-start mx-5 g-2">
            {{-- <a class="navbar-brand mt-2 mt-lg-0 d-flex ms-5" href="/homepage">
                BLAWG
            </a> --}}
            <a class="navbar-brand mt-2 mt-lg-0 d-flex" href="/homepage">
                <img class="imgg mt-1" src="{{ url('/assets/images/logo.png') }}" height="35" alt="BLAWG"
                    loading="lazy" />
            </a>    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/homepage">home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Music</a></li>
                            <li><a class="dropdown-item" href="#">Politics</a></li>
                            <li><a class="dropdown-item" href="#">Travel</a></li>
                            <li><a class="dropdown-item" href="#">Technology</a></li>
                            <li><a class="dropdown-item" href="#">Food</a></li>
                            <li><a class="dropdown-item" href="#">Motivational</a></li>
                            <li><a class="dropdown-item" href="#">Gaming</a></li>
                            <li><a class="dropdown-item" href="#">Philosophy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">about</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">pay me</a>
                    </li> --}}
                </ul>
                <!-- Left links -->
                <div class="d-flex justify-content-start">
                    @auth

                        <div class="d-flex">
                            <!-- Profile thingy -->
                            <div class="dropdown me-3">
                                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <button class="btn text-dark align-middle">{{ auth()->user()->username }}</button>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end"
                                    aria-labelledby="navbarDropdownMenuAvatar">
                                    <li>
                                        <a class="dropdown-item" href="/profile/{{ auth()->user()->username }}">My
                                            profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/create-post">Create Post</a>
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST" class="d-inline">
                                            @csrf
                                            <button class="dropdown-item">Sign Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- Profile thingy end-->

                            {{-- <a class="btn shadow-0" href="/create-post">Post</a>
                <form action="/logout" method="POST" class="d-inline">
                @csrf
                  <button class="btn shadow-0">Sign Out</button>
                </form> --}}
                            {{-- button alternative ::::: btn-outline-dark btn-rounded me-5 --}}
                        @else
                            {{-- <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
              @csrf
              <div class="row align-items-center">
                <div class="col-md-auto col-sm-2 col-xs-2 mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginusername" class="form-control form-control-sm input-dark rounded-5" type="text" placeholder="Username" autocomplete="off" />
                </div>
                <div class="col-md-auto col-sm-2 col-xs-2 mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginpassword" class="form-control form-control-sm input-dark rounded-5" type="password" placeholder="Password" />
                </div>
                <div class="col-md-auto">
                  <button class="btn">Sign In</button>
                </div>
            </form>  --}}

                            {{-- <a class="col-md-auto mr-0 pr-md-0 mb-3 mb-md-0" href="/register">  
              <button type="submit" class="btn">Register</button>
            </a> --}}

                            {{-- <div class="dropdown col-md-auto">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                Login
              </button>
              <form action="/login" method="POST" class="dropdown-menu p-4 mx-0 my-0">
                @csrf
                <div class="mb-3">
                  <label for="exampleDropdownFormEmail2" class="col-form-label">Email address</label>
                  <input name="loginusername" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                </div>
                <div class="mb-3">
                  <label for="exampleDropdownFormPassword2" class="col-form-label">Password</label>
                  <input name="loginpassword" type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
            </div> --}}

                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content g-3 p-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Log In</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/login" method="POST" class="mx-0 my-0">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleDropdownFormEmail2"
                                                        class="col-form-label">Username</label>
                                                    <input name="loginusername" type="text" class="form-control"
                                                        id="exampleDropdownFormEmail2"
                                                        placeholder="Write your username here">
                                                    @error('loginusername')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleDropdownFormPassword2"
                                                        class="col-form-label">Password</label>
                                                    <input name="loginpassword" type="password" class="form-control"
                                                        id="exampleDropdownFormPassword2"
                                                        placeholder="Write your password here">
                                                    @error('loginpassword')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                                No account? <a href="" data-bs-target="#exampleModalToggle2"
                                                    data-bs-toggle="modal" data-bs-dismiss="modal">Create an Account!</a>
                                                <br>
                                                <div class="pt-4">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/register" method="POST" id="registration-form">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username-register"
                                                        class="text-muted mb-1"><small>Username</small></label>
                                                    <input name="username" value="{{ old('username') }}"
                                                        id="username-register" class="form-control" type="text"
                                                        placeholder="Pick a username" autocomplete="off" />
                                                    @error('username')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div><br>

                                                <div class="form-group">
                                                    <label for="email-register"
                                                        class="text-muted mb-1"><small>Email</small></label>
                                                    <input name="email" value="{{ old('email') }}" id="email-register"
                                                        class="form-control" type="text" placeholder="you@example.com"
                                                        autocomplete="off" />
                                                    @error('email')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div><br>

                                                <div class="form-group">
                                                    <label for="password-register"
                                                        class="text-muted mb-1"><small>Password</small></label>
                                                    <input name="password" id="password-register" class="form-control"
                                                        type="password" placeholder="Create a password" />
                                                    @error('password')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div><br>

                                                <div class="form-group">
                                                    <label for="password-register-confirm"
                                                        class="text-muted mb-1"><small>Confirm Password</small></label>
                                                    <input name="password_confirmation" id="password-register-confirm"
                                                        class="form-control" type="password"
                                                        placeholder="Confirm password" />
                                                    @error('password_confirmation')
                                                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div><br>
                                                Already have an account? <a href=""
                                                    data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                                    data-bs-dismiss="modal">Sign In!</a>
                                                <div class="pt-4">
                                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn shadow-0" data-bs-toggle="modal" href="#exampleModalToggle"
                                role="button">Login</a>

                        @endauth
                    </div>
                </div>



                <!--Right elements-->

            </div>
    </nav>
    <!-- Navbar -->

    @if (session()->has('success'))
        {{-- <p class="alert alert-success text-center">
        {{session('success')}}
      </p> --}}
        <div class="d-flex justify-content-center row">
            <div class="d-flex col-md-4 alert alert-primary alert-dismissible fade show justify-content-center text-center"
                role="alert">
                <div class="text-center">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="d-flex justify-content-center row">
            <div class="alert alert-warning d-flex col-md-4 alert-dismissible fade show justify-content-center text-center"
                role="alert">
                <div class="text-center">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{ $slot }}

    <footer class="footer" style="background-color: #343A40;">
        <section class="d-flex justify-content-center p-2">
            <!-- Left -->
            <div class="ms-2 me-4 d-lg-block">
                <span style="color: #9b9b9b;">Get connected with us on social networks:</span>
            </div>
        </section>
        <!-- Left -->
        <section class="d-flex justify-content-center p-2">
            <!-- Right -->
            <div class="d-flex">
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/lalfakzuala-hk-21143512b/" class="me-4 link-secondary">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/theohk/" class="me-4 link-secondary">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <div class="text-center p-1 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a style="color: #9b9b9b;" href="https://github.com/theohk/">Faktea Hk</a>
        </div>
        <!-- Copyright -->
    </footer>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    <script>
        $('[data-toggle="tooltip"]').tooltip()
    </script>

</body>

</html>

@yield('scripts')
