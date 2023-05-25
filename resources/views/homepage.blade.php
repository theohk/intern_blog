  <x-layout>
      <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
          .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
          }

          @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                  font-size: 3.5rem;
              }
          }
      </style>



      <!-- Custom styles for this template -->
      <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="blog.css" rel="stylesheet">
      </head>

      <div class="">
          <div class="p-4 p-md-5 mb-4 text-white rounded bg-light">
              <div class="row px-0 d-flex">
                  <h1 class="display-4 fst-italic text-dark text-center">Welcome to Blawg! The place to be for
                      inquisitive minds</h1>
                  <p class="text-dark text-center">Everything and everything can be said here. No restrictions. Write
                      what you will, say what you wish. It's all on you, to your heart's content. Write away!</p>
              </div>
          </div>

          <!-- <a href="/filteredposts" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Posts Filtered</a> -->

          <div class="container g-0">
              <div class="">
                  <div class="row mb-2 d-flex align-items-stretch">

                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel"
                          data-bs-interval="2500">
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <div class="col-md-12">
                                      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                                          style="background-color: lavender;">
                                          <div class="col p-4 d-flex flex-column position-static h-100">
                                              <h3 class="mb-0">{{ $title1 }}</h3>
                                              <p class="card-text mb-auto">{!! Str::limit($body1, 200) !!}</p>
                                              <div class="text">
                                                  <a href="/post/21" class="stretched-link">Read More</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="col-md-12">
                                      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                                          style="background-color: lavender;">
                                          <div class="col p-4 d-flex flex-column position-static h-100">
                                              <h3 class="mb-0">{{ $title2 }}</h3>
                                              <p class="mb-auto">{!! Str::limit($body2, 200) !!}</p>
                                              <div class="text">
                                                  <a href="post/25" class="stretched-link">Read More</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      {{-- <div class="col-md-6">
                          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                              style="background-color: lavender;">
                              <div class="col p-4 d-flex flex-column position-static h-100">
                                  <h3 class="mb-0">{{ $title1 }}</h3>
                                  <p class="card-text mb-auto">{!! Str::limit($body1, 100) !!}</p>
                                  <div class="text-end">
                                      <a href="/post/21" class="stretched-link">Read More</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                              style="background-color: lavender;">
                              <div class="col p-4 d-flex flex-column position-static h-100">
                                  <h3 class="mb-0">{{ $title2 }}</h3>
                                  <p class="mb-auto">{!! Str::limit($body2, 100) !!}</p>
                                  <div class="text-end">
                                      <a href="post/25" class="stretched-link">Read More</a>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                  </div>
              </div>

              <div class="row mb-2 d-flex">
                  <div class="col-md-12">
                      <h3 class="mb-4 text-center fst-italic border-bottom">
                          Read the latest posts...
                      </h3>

                      <div class="container-sm pt-3 justify-content-center">
                          <div class="row row-cols-1 row-cols-md-2 g-4">
                              @foreach ($post as $posts)
                                  <div class="col mb-4">
                                      <div class="card h-100 border rounded">
                                          <div class="card-body">
                                              <a href="/post/{{ $posts->id }}" style="color: black;"><h5 class="d-flex justify-content-center card-title">{{ $posts->title }}
                                              </h5></a>
                                              <div class="d-flex justify-content-center bd-highlight me-2">
                                                  <small>Posted on {{ $posts->created_at->format('d M') }} by
                                                      <span
                                                          style="font-weight:bold">{{ $posts->user->username }}</span></small>
                                              </div>

                                              <p class="card-text mb-auto text-truncate">{!! Str::limit(preg_replace('/<img[^>]+>/', '', strip_tags($posts->body, '<p><a><strong><em><u>')), 200) !!}</p>
                                          </div>
                                          <div class="card-footer text-muted">
                                              <div class="d-flex">
                                                  @foreach ($posts->postTags as $postTags)
                                                      <span
                                                          class="badge badge-pill badge-info mr-auto">{{ $postTags->tag->tagName }}</span>
                                                      <span style="margin-left:0.5em"></span>
                                                  @endforeach
                                                  <a href="/post/{{ $posts->id }}" class="card-link ms-auto">Read
                                                      more</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="d-flex justify-content-left">
                          {!! $post->links('pagination::bootstrap-5') !!}
                      </div>
                      {{-- <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
          </nav> --}}
                  </div>
              </div>
          </div>
      </div>

      </div>
      <br>


  </x-layout>
