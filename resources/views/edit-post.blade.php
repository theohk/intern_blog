<x-layout>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <div class="container py-md-5 container--narrow">
          
        <div class="pb-2"><a href="/post/{{$post->id}}">&laquo; Back to post</a></div>
          <form action="/post/{{$post->id}}" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label for="post-title" class="text-dark mb-1"><h5>Title:</h5></label>
              <input value="{{old('title', $post->title)}}" name="title" id="post-title" class="form-control form-control-lg" type="text" placeholder="" autocomplete="off" />
              @error('title')
              <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
              @enderror
          </div><br>
    
            <div class="form-group vh-50">
              <label for="editor" class="text-dark mt-2 mb-1"><h5>Body Content:</h5></label>
              <textarea name="body" rows="8" id="editor" class="body-content tall-textarea form-control" type="text">{{old('body', $post->body)}}</textarea>
              @error('body')
              <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
              @enderror
          </div>
          <br>
  
          <div>
            <h6>Select Tags: </h6>
            <div class="row row-cols-auto">
              @foreach ($tags as $item)
              <div class="col">
                <input name="tags_id[]" class="form-check-input" type="checkbox" id="tagInput" value="{{ $item->id }}">         
                <label class="form-check-label" for="flexSwitchCheckDefault" value="{{ $item->id }}">{{$item->tagName}}</label>
              </div>
              @endforeach
            </div>
          </div>
  
        <br>
  
            <button class="btn btn-primary">Save Changes</button>
          </form>
        </div>
  
        
  
  
  @section('scripts')
          <script>
                  ClassicEditor
                          .create( document.querySelector( '#editor' ) )
                          .then( editor => {
                                  console.log( editor );
                          } )
                          .catch( error => {
                                  console.error( error );
                          } );
          </script>
  
  @endsection
  
  </x-layout>
  