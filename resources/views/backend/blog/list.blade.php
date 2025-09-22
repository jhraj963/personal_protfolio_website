@extends('backend.layouts.app')
@section('content')

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blog Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    @include('message')
    <section class="col-lg-12">
        <a href="{{ url('admin/blog/add') }}" class="btn btn-warning">Add Blog</a>
        <div class="card">
            <div class="card-header">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getrecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                                @if(!empty($value->image))
                                    @if(file_exists(public_path('blog/'.$value->image)))
                                       <img src="{{ url('blog/'.$value->image) }}" width="70" height="70">
                                    @endif
                                @endif
                            </td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <a onclick="return confirm('Ar you sure want to delete?')" href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
