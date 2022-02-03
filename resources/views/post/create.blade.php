
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>share your image</title>
    @include('layout.head')

    <style>
        body{
            background-image: url('{{ asset('template/img/background.png') }} ');
        }
        .tengah{
            position : absolute;
            top: 30%;
            background : #B3B6B7;
            width : auto;
            height: auto;
            left : 20%;
            right : 20%;
            align: justify;
        }
    </style>
</head>
<body>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Share your image</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="tengah">
        @if ($message = Session::get('success'))
        <div class="alert alert-succes">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>  
        @endif
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image</strong>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-100 col-md-12">
                        <div class="form-group">
                            <strong>Description</strong>
                            <input type="text-area" name="desc" class="form-control" placeholder="Description">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Posted By</strong>
                            <input type="text" name="posted_by" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('layout.script')

</body>
</html>
