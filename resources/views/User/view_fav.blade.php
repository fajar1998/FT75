@extends('master')
@section('title', '| Favorit Saya')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Favorit Saya</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Favorit Saya</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Film</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($favs as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['film']['name'] }}</td>
                                            <td> <img alt=""
                                                    src="{{ !empty($item['film']['image']) ? url('upload/film/' . $item['film']['image']) : url('upload/wa1.jpg') }}"
                                                    style="width: 60px; width:60px;">
                                            </td>
                                            <td>{{ $item['film']['desk'] }}</td>
                                            <td>
                                                <a href="#HapusKat{{ $item->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm" title="Hapus Dari Favorit"><i
                                                        class="fa fa-trash"></i></a>
                                                @include('User.modal_hapus')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
