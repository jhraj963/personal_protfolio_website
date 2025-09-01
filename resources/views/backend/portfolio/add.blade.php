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
            <h1 class="m-0">Protfolio Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Protfolio</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @include('message')
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add New Protfolio</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{ url('admin/portfolio/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Protfolio Title <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" placeholder="Type Your Name" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Protfolio Image <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control" required>
                           
                        </div>
                    </div>
                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Add</button>
                    <a href="" class="btn btn-default float-right">Cancel</a>
                </div>

            </form>
        </div>
    </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
