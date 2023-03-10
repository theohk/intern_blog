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
          {{-- <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Ngeiha and Pu Zoramthanga are finally back together!</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="fw-bold">Continue reading...</a></p>
    </div>
  </div> --}}

          <div class="container g-0">
              <div class="d-flex flex-column">
                  <div class="row mb-2 d-flex">
                      <div class="col-md-6">
                          <div
                              class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                              <div class="col p-4 d-flex flex-column position-static">
                                  <strong class="d-inline-block mb-2 text-primary">World</strong>
                                  <h3 class="mb-0">{{ $title1 }}</h3>
                                  <p class="card-text mb-auto">{!! Str::limit($body1, 100) !!}</p>
                                  <a href="/post/21" class="stretched-link">Continue reading</a>
                              </div>
                              <div class="col-auto d-none d-lg-block">
                                  <svg class="bd-placeholder-img" width="200" height="250"
                                      xmlns="http://www.w3.org/2000/svg" role="img"
                                      aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                      focusable="false">
                                      <title>Placeholder</title>
                                      <rect width="100%" height="100%" fill="#55595c" /><text x="50%"
                                          y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                  </svg>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div
                              class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                              <div class="col p-4 d-flex flex-column position-static">
                                  <strong class="d-inline-block mb-2 text-success">Design</strong>
                                  <h3 class="mb-0">{{ $title2 }}</h3>
                                  <p class="mb-auto">{!! Str::limit($body2, 100) !!}</p>
                                  <a href="post/25" class="stretched-link">Continue reading</a>
                              </div>
                              <div class="col-auto d-none d-lg-block">
                                  <svg class="bd-placeholder-img" width="200" height="250"
                                      xmlns="http://www.w3.org/2000/svg" role="img"
                                      aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                      focusable="false">
                                      <title>Placeholder</title>
                                      <rect width="100%" height="100%" fill="#55595c" /><text x="50%"
                                          y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                  </svg>

                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row mb-2 d-flex">
                      <div class="col-md-8">
                          <h3 class="mb-4 text-center fst-italic border-bottom">
                              From the Firehose
                          </h3>

                          <div class="container-sm pt-3">
                              <div class="row">
                                  @foreach ($post as $posts)
                                      <div class="col-md-12">
                                          <a href="/post/{{ $posts->id }}"
                                              class="list-group-item list-group-item-action p-1">
                                              <div class="d-flex justify-content-center bd-highlight">
                                                  <div class="bd-highlight">
                                                      <strong style="font-size: 1.5em;">{{ $posts->title }}</strong>
                                                  </div>
                                              </div>
                                          </a>
                                          <div class="d-flex justify-content-center bd-highlight mb-1">
                                              <div class="bd-highlight">
                                                  <tt style="font-size: 0.875em;">Posted on
                                                      {{ $posts->created_at->format('d M') }} by
                                                      {{ $posts->user->username }}</tt>
                                              </div>
                                          </div>

                                          <div class="d-flex justify-content-center bd-highlight me-2">
                                              @foreach ($posts->postTags as $postTags)
                                                  <span class="badge badge-pill badge-info">
                                                      {{ $postTags->tag->tagName }}
                                                  </span>
                                                  <span style="margin-left:0.5em"></span>
                                              @endforeach
                                          </div>

                                          <div class="d-flex justify-content-left bd-highlight me-2">
                                              <div class="body-content p-1">
                                                  {!! Str::limit($posts->body, 400) !!} <a href="/post/{{ $posts->id }}"
                                                      style="font-size: 0.875em;">read more</a>
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                                  @endforeach
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
