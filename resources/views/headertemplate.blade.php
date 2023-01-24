<header class="header-bar mb-3">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center p-3">
      <h4 class="ml-4 my-0 mr-md-auto font-weight-normal"><a href="/homepage" class="text-dark">Intern Blog</a></h4>
      
      @auth
      <div class="flex-row my-3 my-md-0">
        <a href="#" class="text-dark mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
        {{-- <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span> --}}
        Hello, <a href="/profile/{{auth()->user()->username}}" class="mr-2">{{auth()->user()->username}}</a>
        <a class="btn btn-sm btn-outline-secondary mr-2" href="/create-post">Create Post</a>
        <form action="/logout" method="POST" class="d-inline">
          @csrf
          <button class="btn btn-sm btn-outline-secondary mr-5">Sign Out</button>
        </form>
      </div>
      @else 

      <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
        @csrf
        <div class="row align-items-center">
          <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
            <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
          </div>
          <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
            <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
          </div>
          <div class="col-md-auto">
            <button class="btn btn-sm btn-outline-secondary">Sign In</button>
          </div>
        </div>
      </form>

      <div class="col-md-auto">
        <a href="/register">  
          <button type="submit" class="btn btn-sm btn-outline-secondary mr-2">Register</button>
        </a>
      </div>
      @endauth
    
    </div>
  </header>