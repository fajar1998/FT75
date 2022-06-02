<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Fajar | Test </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Rahadi Fajar</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">




                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Sedang Tayang</strong></h5>
                                        <br><br>
                                        <div class="col-md-12">


                                            <div class="card">
                                                @foreach ($flm->chunk(3) as $chunk)
                                                    <div class="row">
                                                        @foreach ($chunk as $value)
                                                            <div class="col-md-4"> <img id="showImage"
                                                                    src="{{ !empty($value->image) ? url('upload/film/' . $value->image) : url('upload/wa1.jpg') }}">
                                                                <h4>{{ $value->name }}</h4>
                                                                <p>Kategori : {{ $value['kategori']['name'] }}</p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <br>
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Segera Hadir</strong></h5>
                                        <br><br>
                                        <div class="col-md-12">


                                            <div class="card">
                                                @foreach ($csf->chunk(3) as $ck)
                                                    <div class="row">
                                                        @foreach ($ck as $soon)
                                                            <div class="col-md-4"> <img id="showImage"
                                                                    src="{{ !empty($soon->image) ? url('upload/film/' . $soon->image) : url('upload/wa1.jpg') }}">
                                                                <h4>{{ $soon->name }}</h4>
                                                                <p>Kategori : {{ $soon['kategori']['name'] }}</p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->



            </div>

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="template/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="template/dist/js/adminlte.min.js"></script>
</body>

</html>
