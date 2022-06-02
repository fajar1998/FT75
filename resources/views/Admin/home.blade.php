@extends('master')

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
                <div class="row">
                    @if (auth()->user()->hak_akses == 1)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $hit_film }}</h3>

                                    <p>Total Film</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $hit_kat }}</h3>

                                    <p>Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                            </div>
                        </div>
                    @endif

                </div>

                <div class="row">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Semua Film</strong></h5>
                            <br><br>
                            <div class="col-md-12">


                                <div class="card">
                                    @foreach ($filem->chunk(3) as $chunk)
                                        <div class="row">
                                            @foreach ($chunk as $value)
                                                <div class="col-md-4">

                                                    <img id="showImage"
                                                        src="{{ !empty($value->image) ? url('upload/film/' . $value->image) : url('upload/wa1.jpg') }}">

                                                    <a href="{{ route('lihat.rating', $value->id) }}">
                                                        <h4>{{ $value->name }}</h4>
                                                    </a>

                                                    @if (auth()->user()->hak_akses == 2)
                                                        <form action="{{ route('fav.store') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $value->id }}" name="film_id">
                                                            <button type="sumbit" class="btn btn-danger"
                                                                title="Tambakan Ke Favorit"><i
                                                                    class="fas fa-heart"></i></button>

                                                        </form>
                                                    @endif

                                                    <p>Kategori : {{ $value['kategori']['name'] }}</p>
                                                    <p>Status Penayangan : <strong>
                                                            @if ($value->status == '1')
                                                                <span class="badge badge-info"> Sedang Tayang</span>
                                                            @elseif($value->status == '2')
                                                                <span class="badge badge-success">Tayang Nanti</span>
                                                            @elseif($value->status == '3')
                                                                <span class="badge badge-danger">Segera Hadir</span>
                                                            @endif
                                                        </strong></p>
                                                    <p>Deskripsi : {{ $value->desk }}</p>

                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
