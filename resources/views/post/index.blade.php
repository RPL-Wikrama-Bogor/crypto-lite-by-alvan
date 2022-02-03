
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only. -->
<html lang="en">
<head>
    <title>Home</title>
    @include('layout.head')

    <style>
        body{
            background-image: url('{{ asset('template/img/background.png') }} ');
        }
        .tengah{
            position : absolute;
            background: #B3B6B7;
            width : auto;
            height: auto;
            left : 10%;
            right : 10%;
            align: justify;
        }
    </style>
</head>
<body>
<div>



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
              <li class="breadcrumb-item active"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('post.create') }}">Share your image</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="tengah">
          <table class="table table-bordered">
            <thead class="thead-dark">
                <th scope="col">No</th>
                <th scope="col">Images</th>
                <th scope="col">Description</th>
                <th scope="col">Posted by</th>
                <th scope="col">Post date</th>
            </thead>
            @foreach ($posts as $post)
            <thead class="thead-light">
                <td height="100px;">{{ ++$i }}</td>
                <td><img width ="150px" height= "80px" src="{{ asset('storage/post-image/' . $post->foto )}}" alt="tidak ada foto"></td>
                <td height="100px;" >{{ $post->desc }}</td>
                <p><td height="100px;" >{{ $post->posted_by }}</td></p>
                <td height="100px;" >{{ $post->tgl }}</td>
            @endforeach
            </thead>
          </table>
          {!! $posts->links() !!}
        </div>
    </div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('layout.script')
    
</body>
</html>
