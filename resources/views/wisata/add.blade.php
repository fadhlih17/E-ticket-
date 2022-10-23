<!-- Tampilan halaman tambah data wisata -->
@extends('layouts.main')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tambah Tempat Wisata</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <form action="{{ route('wisata_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Label input tambah nama wisata -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Wisata</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <!-- Label input tambah lokasi wisata -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Lokasi Wisata</label>
                            <div class="col-sm-10">
                                <input type="text" name="location" class="form-control">
                            </div>
                        </div>
                        <!-- Label input tambah harga wisata -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Harga Wisata</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <!-- Label input tambah gambar wisata -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Gambar Wisata</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <!-- Button save -->
                        <button type="submit" class="btn btn-success">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection