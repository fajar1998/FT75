@extends('master')
@section('title', '| Detail Film')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Detail Film</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title">Detail Film</h5>
                        </div>


                    </div>
                    <div class="card-body">
                        <div>
                            <img alt=""
                                src="{{ !empty($detail->image) ? url('upload/film/' . $detail->image) : url('upload/wa1.jpg') }}">
                        </div>

                        <div class="row">
                            <h5>Judul Film</h5>&nbsp;
                            <h5>:</h5>&nbsp;
                            <h5><strong>{{ $detail->name }}</strong></h5>
                        </div>

                        <div class="row">
                            <h5>Kategori</h5>&nbsp;
                            <h5>:</h5>&nbsp;
                            <h5><strong>{{ $detail['kategori']['name'] }}</strong></h5>
                        </div>

                        <div class="row">
                            <h5>Status Penayangan</h5>&nbsp;
                            <h5>:</h5>&nbsp;
                            <h5><strong>
                                    @if ($detail->status == '1')
                                        <span class="badge badge-info"> Sedang Tayang</span>
                                    @elseif($detail->status == '2')
                                        <span class="badge badge-success">Tayang Nanti</span>
                                    @elseif($detail->status == '3')
                                        <span class="badge badge-danger">Segera Hadir</span>
                                    @endif
                                </strong></h5>
                        </div>

                        <div class="row">
                            <h5>Deskripsi</h5>&nbsp;
                            <h5>:</h5>&nbsp;
                            <h5>{{ $detail->desk }}</h5>
                        </div>

                        Rating
                        <form action="{{ route('listfilm.update', $detail->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <form action=""></form>
                                <input type="radio" name="rating" value="5">
                                <input type="radio" name="rating" value="4">
                                <input type="radio" name="rating" value="3">
                                <input type="radio" name="rating" value="2">
                                <input type="radio" name="rating" value="1">
                            </div>
                            <button type="submit" class="btn btn-info">Kirim rating</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
