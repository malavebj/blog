 <!-- Modal -->
  <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('admin.posts.store','#create')}}">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Post Title</label>
              <input id="postTitle" type="text" value="{{ old('title') }}" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" placeholder="Enter post Title" required autofocus>
              {!! $errors->first('title','<span class="help-block">:message</span>') !!}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Create Post</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>