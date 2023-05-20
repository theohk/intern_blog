<x-layout>
    <div class="container-sm pt-3">
        <h2>
            <i class="text-dark fs-3 mt-1 fas align-middle fa-user-astronaut fa-2x"></i>
            <form class="ml-2 d-inline" action="#" method="POST">
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
            </form>
        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
            <a href="#" class="profile-nav-link nav-item nav-link active">Posts:
                {{ auth()->user()->posts()->count() }}</a>
            {{-- <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a> --}}
        </div>

        <div class="row">
            @foreach ($post as $posts)
                <div class="card col-md-12">
                    <a href="/post/{{ $posts->id }}" class="list-group-item list-group-item-action p-3">
                        {{-- <tt style="font-size: 0.875em;">{{$posts->created_at->format('d M')}}</tt>
                <strong>{{$posts->title}}</strong>
                @foreach ($posts->postTags as $postTags)
                  <span class="badge badge-pill badge-info align-content-right">
                    {{$postTags->tag->tagName}}
                  </span>
                @endforeach      --}}
                        <div class="d-flex justify-content-between bd-highlight">
                            <div class="bd-highlight">
                                <tt style="font-size: 0.875em;">{{ $posts->created_at->format('d M') }}</tt>
                                <strong style="margin-left:1em">{{ $posts->title }}</strong>
                            </div>
                            <div class="bd-highlight">
                                @foreach ($posts->postTags as $postTags)
                                    <span class="badge badge-pill badge-info align-content-right">
                                        {{ $postTags->tag->tagName }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-left">
            {!! $post->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    </div>

</x-layout>
