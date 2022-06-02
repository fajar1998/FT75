@extends('master')
@section('title', '| Update Film')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Film</li>
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
                            <h3 class="card-title">Update Film</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('listfilm.update', $filem->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Film</label>
                                    <input type="text" class="form-control" placeholder="Judul Film" name="name"
                                        value="{{ $filem->name }}">
                                </div>
                                <div class=" row">
                                    <div class="col-md-4">
                                        <label>Kategori</label>
                                        <select name="id_kategori" class="form-control">
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id }}"
                                                    {{ $filem->id_kategori == $kat->id ? 'selected' : '' }}>
                                                    {{ $kat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Status Film</label>
                                        <select name="status" class="form-control">
                                            <option value="" selected="" disabled="">Pilih Status</option>
                                            <option value="1" {{ $filem->status == '1' ? 'selected' : '' }}>Sedang Tayang
                                            </option>
                                            <option value="2" {{ $filem->status == '2' ? 'selected' : '' }}>Tayang Nanti
                                            </option>
                                            <option value="3" {{ $filem->status == '3' ? 'selected' : '' }}>Segera Hadir
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" placeholder=". . . " name="desk" value="{{ $filem->desk }}"></textarea>

                                </div>



                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
