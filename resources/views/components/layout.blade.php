<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FakteaApp</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" phpcrossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />

    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
    />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

  </head>

<body>
   <!-- Navbar -->

<nav class="navbar navbar-expand-xl bg-light fixed-top">
  <div class="container-fluid mx-5 g-5">
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i></button>
    <!-- Collapsible wrapper -->
    <!-- Navbar brand -->  
    <div class="d-flex navbar-header">
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="{{url('/assets/images/logo.png')}}" height="35" alt="BLAWG" loading="lazy"/>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">       
      <!-- Left links -->
      <ul class="nav justify-content-center navbar-nav mb-2 mb-lg-0">
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

    <!--Right elements-->
    <div class="d-flex nav navbar-nav navbar-right">        
      @auth
        
        <div class="d-flex align-items-center">  
          <!-- Profile thingy -->
          <div class="dropdown me-3">
            <a
              class="dropdown-toggle d-flex align-items-center hidden-arrow hover-zoom border border-1 rounded border-primary border-opacity-25"
              href="#"
              id="navbarDropdownMenuAvatar"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
              >
            <img
              src="{{url('/assets/images/avatar2.png')}}"
              class="rounded"
              height="30"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
            </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
                <li>
                  <a class="dropdown-item" href="/profile/{{auth()->user()->username}}">My profile</a>
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
              <button class="btn me-5">Sign Out</button>
            </form>
            {{-- button alternative ::::: btn-outline-dark btn-rounded me-5 --}}
      
      @else 

        <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
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
          </form> 
          <a class="col-md-auto mr-0 pr-md-0 mb-3 mb-md-0" href="/register">  
            <button type="submit" class="btn">Register</button>
          </a>  
          
      @endauth                  
    </div>
  </div>  
</nav>
<!-- Navbar -->

    @if (session()->has('success'))
      <div class="container container--narrow">
        <div class="alert alert-success text-center">
          {{session('success')}}
        </div>
      </div>
    @endif

    @if (session()->has('error'))
      <div class="container container--narrow">
        <div class="alert alert-danger text-center">
          {{session('error')}}
        </div>
      </div>
    @endif

    {{$slot}}
    
    <footer class="mt-auto" style="background-color: #343A40;">
      <div class="container p-2">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-2">
            <h5 class="mb-3 mt-2 text-white">footer content</h5>
            <p style="color: #9b9b9b;">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
              molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
              voluptatem veniam, est atque cumque eum delectus sint!
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-2">
            <h5 class="mb-3 mt-2 text-white">links</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                <a href="#!" style="color: #9b9b9b;">FAQ</a>
              </li>
              <li class="mb-1">
                <a href="#!" style="color: #9b9b9b;">Classes</a>
              </li>
              <li class="mb-1">
                <a href="#!" style="color: #9b9b9b;">Pricing</a>
              </li>
              <li>
                <a href="#!" style="color: #9b9b9b;">Safety</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-2">
            <h5 class="mb-1 mt-2 text-white">opening hours</h5>
            <table class="table" style="border-color: #666;">
              <tbody style="color: #9b9b9b;">
                <tr>
                  <td>Mon - Fri:</td>
                  <td>8am - 9pm</td>
                </tr>
                <tr>
                  <td>Sat - Sun:</td>
                  <td>8am - 1am</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
