@extends('master')
@section('title', '| Detail Film')
@section('content')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

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
                        @if (auth()->user()->hak_akses == 2)
                            <form action="{{ route('rating.ubah', $detail->id) }}" method="POST">
                                @csrf
                                <div class="rating">
                                    <input id="input-1" name="rating" class="rating rating-loading" data-min="0"
                                        data-max="5" data-step="1" value="{{ $detail->rating }}" data-size="xs">
                                    <input type="hidden" name="id" required="" value="{{ $detail->id }}">
                                    <br />
                                    <button class="btn btn-success">Tambahkan Rating</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        $("#input-id").rating();
    </script>

@endsection
