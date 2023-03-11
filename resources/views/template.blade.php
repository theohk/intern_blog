<x-layout>

    <div class="container-sm mx-5">
        <div class="col-md-12">
            @foreach ($post as $posts)
                <h1>{{ $posts->username }}</h1>
                <p>
                <h1>Title:</h1> {{ $posts->title }}</p>
                <p>
                <h1>Body:</h1> {!! $posts->body !!}</p>
                <h1>Tags:</h1>
                @foreach ($posts->postTags as $postTags)
                    {{ $postTags->tag->tagName }}
                @endforeach
                <hr>
                <p>Posted by {{ $posts->user->username }}</p>
                <div>
                    <span class="badge">Posted at
                        {{ \Carbon\Carbon::parse($posts->created_at)->format('j/n/Y') }}</span>
                    {{-- <div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span><span class="label label-danger">Danger</span></div>          --}}
                    <br><br>
                </div>
            @endforeach
        </div>

        <hr>

        <div class="d-flex justify-content-left">
            {!! $post->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</x-layout>
