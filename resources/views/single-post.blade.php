<x-layout>
  <style>
    img {
      display: block;
      width: 30vw;
      height: 30vw;
      margin-left: auto;
      margin-right: auto;
    }

    .imgg {

      width: 6.3em;
      height: 1.7em;
    }

    .imggg {
      width: 1.5vw;
      height: 1.5vw;
    }
  </style>
    <div class="container py-md-3 topmar">
        <div class="d-flex justify-content-between">
          <h2>{{$post->title}}</h2>
          @can('update', $post)
          <span class="pt-2">
            <a href="/post/{{$post->id}}/edit" class="me-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="/post/{{$post->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-post-button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
            </form>
          </span>
          @endcan
        </div>
  
        <p class="text-muted small mb-4">
          Posted by <a href="/profile/{{$post->user->username}}">{{$post->user->username}}</a> on {{$post->created_at->format('n/j/Y')}}
        </p>
        
        <div class="body-content card p-4">
          {!! $post->body !!}
        </div>
      </div>
</x-layout>
