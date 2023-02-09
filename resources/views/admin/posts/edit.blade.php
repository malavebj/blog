@extends('admin.layout')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item "><a href="{{ route('dashboard')}}">Starter Page</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <!-- Pictures -->
    <div class="col-sm-12">
      <div class="box-body">
        <div class="row">
          @foreach($post->photos as $photo)
            <form method="POST" action="{{route('admin.photos.destroy',$photo)}}">
            {{ csrf_field() }}{{ method_field('DELETE') }}
              <div class="col-sm-2">
                <button class="btn btn-danger btn-xs" style="position: absolute;" ><i class="fa fa-times"></i></button>
                <img class="img-responsive" height="100" src="{{ Storage::url($photo->url) }}">        
              </div>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  	<form method="POST" action="{{route('admin.posts.update',$post)}}">
      {{ csrf_field() }}{{ method_field('PUT') }}
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Post Title</label>
            <input type="text" value="{{ old('title',$post->title) }}" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" placeholder="Enter post Title">
            {!! $errors->first('title','<span class="help-block">:message</span>') !!}
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Post Excerpt</label>
            <input type="text" value="{{ old('excerpt',$post->excerpt) }}" name="excerpt" class="form-control {{$errors->has('excerpt') ? 'is-invalid' : ''}}" placeholder="Enter post Excerpt">
            {!! $errors->first('excerpt','<span class="help-block">:message</span>') !!}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group {{$errors->has('body') ? 'is-invalid' : ''}}">
            <label>Post Content</label>
            <textarea id="summernote" class="form-control" name="body" rows="15" placeholder="Enter Post Content">{{ old('body',$post->body) }}</textarea>
            {!! $errors->first('body','<span class="help-block">:message</span>') !!}
          </div>
          <!--Videos-->
          <div class="form-group {{$errors->has('iframe') ? 'is-invalid' : ''}}">
            <label>Post Video (iframe)</label>
            <textarea id="summernote" class="form-control" name="iframe" rows="2" placeholder="Enter iframe of video">{{ old('iframe',$post->iframe) }}</textarea>
            {!! $errors->first('iframe','<span class="help-block">:message</span>') !!}
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Published Date</label>
              <div class="input-group date" id="publisheddate" data-target-input="nearest">
                  <input type="text" value="{{ old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : null ) }}" name="published_at" class="form-control datetimepicker-input" data-target="#publisheddate" placeholder="Select date" />
                  <div class="input-group-append" data-target="#publisheddate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group {{$errors->has('category_id') ? 'is-invalid' : ''}}">
            <label>Category</label>
              <select class="form-control select2" name="category_id" >
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{ old('category_id',$post->category_id) == $category->id ? 'selected' : ''}} >{{$category->name}} </option>
                @endforeach
              </select>
              {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
          </div>
                
          <div class="form-group">
            <label>Tags</label>
            <select class="form-control select2 {{$errors->has('tags') ? 'is-invalid' : ''}}" name="tags[]" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
              @foreach ($tags as $tag)
                <option value="{{$tag->id}}" {{ collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}  >{{$tag->name}} </option>
              @endforeach
            </select>
            {!! $errors->first('tags','<span class="help-block">:message</span>') !!}
          </div>
          
          <div class="form-group">
            <div class="dropzone"></div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Save Post</button>   
          </div>
        </div>
      </div>	                      
    </form>
  </div>

  
  <!-- /.content -->

@stop

@push('styles')
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- summernote -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/summernote/summernote-bs4.min.css")}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2/css/select2.min.css")}}>
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")}}>
  <!-- DropzoneJS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.css">
@endpush

@push('scripts')
  <!-- DropzoneJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src={{asset("adminlte/plugins/moment/moment.min.js")}}></script>
  <script src={{asset("adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
  <!-- Select2 -->
  <script src={{asset("adminlte/plugins/select2/js/select2.full.min.js")}}></script>
  <!-- Summernote -->
  <script src={{asset("adminlte/plugins/summernote/summernote-bs4.min.js")}}></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src={{asset("adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js")}}></script>
  
  
  <script type="text/javascript">
    //Date picker
    $('#publisheddate').datetimepicker({
        format: 'L'
    });

    // Summernote
    $(function () {
      $('#summernote').summernote()
    })
    //Initialize Select2 Elements
    $(function () {
      $('.select2').select2({
        theme: "classic",
        tags: true
      });
    })
    //Initialize DropzoneJS
      var myDropzone = new Dropzone('.dropzone',{
      url: "/admin/posts/{{ $post->url }}/photos",
      paramName: 'photo',
      acceptedFiles: 'image/*',
      headers: {
        'X-CSRF-TOKEN':'{{csrf_token()}}'
      }
    });

    myDropzone.on('error',function (file,res){
      var msg=res.message;
      $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover=false;

  </script>
@endpush
