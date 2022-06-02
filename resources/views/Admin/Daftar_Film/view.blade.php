@extends('master')
@section('title', '| Daftar Film')
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
                            <li class="breadcrumb-item active">Daftar Film</li>
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
                            <h3 class="card-title">Daftar Film</h3>

                            <div class="card-tools">
                                <a href="{{ route('listfilm.create') }}" class="btn btn-info">Tambah Film</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Judul Film</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($film as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item['kategori']['name'] }}</td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="badge badge-info"> Sedang Tayang</span>
                                                @elseif($item->status == '2')
                                                    <span class="badge badge-success">Tayang Nanti</span>
                                                @elseif($item->status == '3')
                                                    <span class="badge badge-danger">Segera Hadir</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('listfilm.edit', $item->id) }}"
                                                    class="btn btn-default btn-sm "><i class="fa fa-edit"></i></a>
                                                <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                @include('Admin.Daftar_Film.modal_del_film')
                                                <a href="{{ route('listfilm.show', $item->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
