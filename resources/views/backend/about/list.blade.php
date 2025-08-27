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
            <h1 class="m-0">About Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                <h3 class="card-title">About Page</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{ url('admin/about/post') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Type Your Name" value="{{ @$getrecord[0]->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" placeholder="Type Your Address" value="{{ @$getrecord[0]->address }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control" placeholder="Type Your Phone Number" value="{{ @$getrecord[0]->number }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" placeholder="Type Your Email" value="{{ @$getrecord[0]->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Consulting solutions</label>
                        <div class="col-sm-10">
                            <input type="number" name="solutions" class="form-control" placeholder="Type Your Total Consulting solutions" value="{{ @$getrecord[0]->solutions }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Completed Cases</label>
                        <div class="col-sm-10">
                            <input type="number" name="cases" class="form-control" placeholder="Type Your Total Completed Cases" value="{{ @$getrecord[0]->cases }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Satisfied Customers</label>
                        <div class="col-sm-10">
                            <input type="number" name="customers" class="form-control" placeholder="Type Your Total Satisfied Customers" value="{{ @$getrecord[0]->customers }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-lable">Expert Consultant</label>
                        <div class="col-sm-10">
                            <input type="number" name="consultant" class="form-control" placeholder="Type Your Total Expert Consultant" value="{{ @$getrecord[0]->consultant }}">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ @$getrecord[0]->id }}">
                </div>

                <div class="card-footer">
                    <button type="submit" name="add_to_update" id="add_to_update" value="@if(count($getrecord)>0) Edit @else Add @endif" class="btn btn-info">@if(count($getrecord)>0)Edit @else Add @endif</button>
                    <a href="" class="btn btn-default float-right">Cancel</a>
                </div>

            </form>
        </div>
    </div>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
