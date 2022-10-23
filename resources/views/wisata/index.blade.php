<!-- Tampilan semua data pada halaman wisata -->
@extends('layouts.main')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tempat Wisata</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <a href="wisata-add" class="btn btn-info">Tambah </a>
                <div class="table-responsive">
                    <!-- Tabel informasi wisata -->
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Wisata</th>
                                <th class="border-top-0">Lokasi</th>
                                <th class="border-top-0">Harga Dewasa</th>
                                <th class="border-top-0">Harga Anak - Anak</th>
                                <th class="border-top-0">Gambar Wisata</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($wisata as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->location}}</td>
                                <td>Rp. {{number_format($data->price)}}</td>
                                <td>Rp. {{number_format($data->price/2)}}</td>
                                <td><img src="{{ url('img/wisata/' .$data->file) }}" width="100px"></td>
                                <td>
                                    <a href="/wisata{{$data->id}}" class="btn btn-warning">Edit</a>
                                    <a href="/delete{{$data->id}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection