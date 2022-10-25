<!-- Tampilan halaman tambah data pemesanan tiket -->
@extends('layouts.main')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tambah Pemesanan Wisata</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <form action="{{ route('transaksi_store') }}" method="post">
                        @csrf
                        <!-- label input nama pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pemesan</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <!-- label input nomor identitas pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Identitas</label>
                            <div class="col-sm-10">
                                <input type="number" name="noId" class="form-control" required>
                            </div>
                        </div>
                        <!-- label input nomor telepon pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor telepon</label>
                            <div class="col-sm-10">
                                <input type="number" name="telp" class="form-control" required>
                            </div>
                        </div>
                        <!-- opsi pilih tempat wisata pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pilih wisata</label>
                            <div class="col-sm-10">
                                <select name="id_wisata" class="form-select" aria-label="Default select example"
                                    required>
                                    <option selected>Silahkan Pilih Tempat Wisata</option>
                                    @foreach ($wisata as $data)
                                    <option value="{{$data->id}}"> - {{$data->name}}, Harga :
                                        {{number_format($data->price)}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- label pilih tanggal kunjungan pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal kunjungan</label>
                            <div class="col-sm-10">
                                <input type="date" min="{{ now()->toDateString('Y-m-d') }}" name="tgl_kunjungan"
                                    class="form-control" min="today" required>
                            </div>
                        </div>


                        <!-- label input jumlah pengunjung dewasa pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Dewasa</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah_dewasa" class="form-control" required>
                            </div>
                        </div>
                        <!-- label input jumlah anak-anak pemesanan tiket -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Anak - Anak</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah_anak" class="form-control" required>
                            </div>
                        </div>
                        <input type="submit" value="Pesan Tiket" class="btn btn-success">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection