<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST">
        @csrf
          <div class="form-group">
            <label for="post-title" class="text-dark mb-1"><h4>Title</h4></label>
            <input value="{{old('title')}}" name="title" id="post-title" class="form-control form-control-lg" type="text" placeholder="" autocomplete="off" />
            @error('title')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
        </div>
  
          <div class="form-group">
            <label for="post-body" class="text-dark mb-1"><h4>Body Content</h4></label>
            <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{old('body')}}</textarea>
            @error('body')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
          <label for="tagInput" class="form-label">Select tag</label>
          <select name="tags_id[]" multiple class="form-select" aria-label="Select tag" id="tagInput" value="Select tag {{ old('tag') }}">
              @foreach ($tags as $item)
                  <option value="{{ $item->id }}">{{ $item->tagName }}</option>
              @endforeach
          </select>
              @error('tags_id')
                <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
              @enderror
      </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
          <button class="btn btn-primary">Save New Post</button>
        </form>
      </div>
</x-layout>
