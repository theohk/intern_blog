<x-layout>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
  <div class="container">
      <div class="col-md-12">
        @foreach ($post as $posts)
        <h1>{{$posts->username}}</h1>
        <p>Title: {{$posts->title}}</p>
        <p>Body: {{$posts->body}}</p>
        <p>Tagname : {{$posts->tag->tagName}}</p>
        <p>Posted by {{$posts->user->username}}</p>
        <div>
        <span class="badge">Posted at {{\Carbon\Carbon::parse($posts->created_at)->format('j/n/Y')}}</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span></div>         
        </div> 
        @endforeach 
        

        
      </div>     
      <hr>

      <div class="d-flex justify-content-left">
        {!! $post->links('pagination::simple-bootstrap-5') !!}
      </div>



  </div>
</x-layout>



