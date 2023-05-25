<x-layout>

    <div class="container-sm pt-3 justify-content-center">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($post as $posts)
            <div class="col mb-4">
                <div class="card h-100 border rounded">
                    <div class="card-body">
                        <a href="/post/{{ $posts->id }}" style="color: black;">
                            <h5 class="d-flex justify-content-center card-title">{{ $posts->title }}
                            </h5>
                        </a>
                        <div class="d-flex justify-content-center bd-highlight me-2">
                            <small>Posted on {{ $posts->created_at->format('d M') }} by
                                <span style="font-weight:bold">{{ $posts->user->username }}</span></small>
                        </div>

                        <p class="card-text mb-auto text-truncate">{!! Str::limit(preg_replace('/<img[^>]+>/', '', strip_tags($body1, '<p><a><strong><em><u>')), 200) !!}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex">
                            @foreach ($posts->postTags as $postTags)
                            <span class="badge badge-pill badge-info mr-auto">{{ $postTags->tag->tagName }}</span>
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

</x-layout>