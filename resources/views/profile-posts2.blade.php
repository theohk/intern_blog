<x-layout>

    <div class="container py-md-5 container--narrow">
        <h2>
            {{-- <img class="avatar-small" src="{{ $avatar }}" />  --}}
            {{ $username }}
            {{-- <form class="ml-2 d-inline" action="#" method="POST">
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                @if (auth()->user()->username == $username)
                    <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
                @endif
            </form> --}}
        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
            <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{ $postCount }}</a>
            {{-- <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a> --}}
        </div>


        <div class="list-group">
            @foreach ($posts as $post)
                <a href="/post/{{ $post->id }}" class="list-group-item d-flex">
                    {{-- <img class="avatar-tiny" src="{{$post->user->avatar}}" /> --}}
                    <i class="">{{ $post->created_at->format('n/j/Y') }}&nbsp;&nbsp;&nbsp;</i>
                    <strong class="me-auto">{{ $post->title }}</strong>  
                    
                    @foreach ($post->postTags as $postTags)
                        <span class="badge badge-pill badge-info justfiy-content-right">
                            {{ $postTags->tag->tagName }}
                        </span>
                        &nbsp;&nbsp;
                    @endforeach

                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-left">
            {!! $posts->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</x-layout>
