<x-layout>
    <div class="container py-md-3">
        <div class="d-flex justify-content-between">
          <h2>{{$post->title}}</h2>
          <span class="pt-2">
            <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="#" method="POST">
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
        </div>
  
        <p class="text-muted small mb-4">
          <a href="#"><img class="avatar-tiny" src="/assets/images/avatar2.png" /></a>
          Posted by <a href="#">{{$post->user->username}}</a> on {{$post->created_at->format('n/j/Y')}}
        </p>
        
        <div class="body-content">
          {!! $post->body !!}
        </div>
      </div>
</x-layout>
