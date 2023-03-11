<x-layout>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST">
            @csrf
            <div class="form-group">
                <label for="post-title" class="text-dark mb-1">
                    <h5>Title:</h5>
                </label>
                <input value="{{ old('title') }}" name="title" id="post-title" class="form-control form-control-lg"
                    type="text" placeholder="" autocomplete="off" />
                @error('title')
                    <p class='m-0 small alert alert-danger shadow-sm'>{{ $message }}</p>
                @enderror
            </div><br>

            <div class="form-group vh-50">
                <label for="editor" class="text-dark mt-2 mb-1">
                    <h5>Body Content:</h5>
                </label>
                <textarea name="body" rows="8" id="editor" class="body-content tall-textarea form-control" type="text">{{ old('body') }}</textarea>
                @error('body')
                    <p class='m-0 small alert alert-danger shadow-sm'>{{ $message }}</p>
                @enderror
            </div>
            <br>

            {{-- <div class="mb-3">
          <label for="tagInput" class="form-label">Select tag</label>
          <select name="tags_id[]" multiple="multiple" class="form-select" aria-label="Select tag" id="tagInput" value="Select tag {{ old('tag') }}">
              @foreach ($tags as $item)
                  <option value="{{ $item->id }}">{{ $item->tagName }}</option>
              @endforeach
          </select>
              @error('tags_id')
                <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
              @enderror
      </div> --}}

            {{-- <div class="mb-3">
        <div class="form-check form-switch">
          @foreach ($tags as $item)
          <input name="tags_id[]" class="form-check-input" type="checkbox" id="tagInput" value="{{ $item->id }}">         
          <label class="form-check-label" for="flexSwitchCheckDefault" value="{{ $item->id }}">{{ $item->tagName }}</label>
          <br>
          @endforeach
        </div>
            @error('tags_id')
              <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
      </div> --}}

            <div>
                <h6>Select Tags: </h6>
                <div class="row row-cols-auto">
                    @foreach ($tags as $item)
                        <div class="col">
                            <input name="tags_id[]" class="form-check-input" type="checkbox" id="tagInput"
                                value="{{ $item->id }}">
                            <label class="form-check-label" for="flexSwitchCheckDefault"
                                value="{{ $item->id }}">{{ $item->tagName }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>

            <button class="btn btn-primary">Save New Post</button>
        </form>
    </div>




    @section('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection

</x-layout>
