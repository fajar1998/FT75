@extends('master')
@section('title', '| Kategori')
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
                            <li class="breadcrumb-item active">Kategori</li>
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
                            <h3 class="card-title">Kategori</h3>

                            <div class="card-tools">
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#tambah1">Tambah
                                    Kategori</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kategori</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td>
                                                <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                    class="btn btn-default "><i class="fa fa-edit"></i></a>
                                                @include('Admin.Kategori.modal_edit')
                                                <a href="#HapusKat{{ $item->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                @include('Admin.Kategori.modal_delete')

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

    @include('Admin.Kategori.modal_add')
@endsection
