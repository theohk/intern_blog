<x-layout>

    <div class="container-sm pt-3 ms-5">
        <h2>
          <img class="avatar-small border border-circle border-primary border-opacity-75" src="{{url('/assets/images/avatar2.png')}}" /> {{$username}}
          <form class="ml-2 d-inline" action="#" method="POST">
            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
            <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
          </form>
        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$postCount}}</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>
  
        <div class="list-group">
          @foreach($posts as $post)
          <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny border border-circle border-primary border-opacity-75" src="{{url('/assets/images/avatar2.png')}}" />
            <strong>{{$post->title}}</strong>
            {{-- {{$post->created_at->format('n/j/Y')}} --}}
            <div class="body-content">
              {!! $post->body !!}
            </div>
          </a>
          @endforeach
        </div>
      </div>
      
</x-layout>