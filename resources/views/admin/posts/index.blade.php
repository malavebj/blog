@extends('admin.layout')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Posts</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Posts in Details</h3>
          <button class="btn btn-primary float-right" data-toggle="modal" data-target="#createPostModal">New Post</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="posts-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Extract</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->excerpt}}</td>
                <td>
                  @can('view',$post)
                    <a  href="{{ route('post.show', $post) }}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                  @endcan
                  @can('update',$post)
                	 <a  href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pen"></i></a>
                  @endcan
                  @can('delete',$post)
                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline;">
                      {{ csrf_field() }}{{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure ??')"><i class="fa fa-times"></i>       
                      </button>
                    </form>
                  @endcan
                </td>
              </tr>
		         @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
  </div>

  <!-- /.content -->
@stop

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href={{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
  <link rel="stylesheet" href={{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
  <link rel="stylesheet" href={{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endpush

@push('scripts')
  <!-- DataTabes  & Plugins -->
  <script src={{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}></script>
  <script src={{asset('adminlte/plugins/jszip/jszip.min.js')}}></script>
  <script src={{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}></script>
  <script src={{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}></script>
  <script src={{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}></script>

  <script>
    $(function () {
      $('#posts-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush