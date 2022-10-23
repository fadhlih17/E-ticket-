<!-- Tampilan semua data pemesan tiket -->
@extends('layouts.main')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Pemesanan Wisata</h4>
        </div>
    </div>

</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <a href="transaksi-add" class="btn btn-info">Tambah </a>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Identitas</th>
                                <th class="border-top-0">Nama Lengkap</th>
                                <th class="border-top-0">Nama Wisata</th>
                                <th class="border-top-0">Total harga</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        $total_harga = 0;
                        ?>
                        <tbody>
                            @foreach ($transaksi as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->noId}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->wisata->name}}</td>
                                <td>
                                    <?php
                                    $total_harga = $data->wisata->price * $data->jumlah_dewasa + (($data->wisata->price * $data->jumlah_anak) / 2);
                                    ?>
                                    Rp. {{number_format($total_harga)}}
                                </td>
                                <td>

                                    <button type="button" class="btn btn-info btn-sm mr-2" data-bs-toggle="modal"
                                        data-bs-target="#modal-lihat-{{ $data->id }}" title="Lihat">
                                        Lihat</button>

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
@foreach ($transaksi as $data)
<!-- Modal Lihat -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" role="dialog" tabindex="-1" id="modal-lihat-{{ $data->id }}"
    class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pemesanan </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">Nama Pemesan</div>
                        <div class="col-md-5 ms-auto">{{ $data->name }}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Nomor Identitas</div>
                        <div class="col-md-5 ms-auto">{{ $data->noId }}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">No. Hp</div>
                        <div class="col-md-5 ms-auto">{{ $data->telp }}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Tempat Wisata</div>
                        <div class="col-md-5 ms-auto">{{$data->wisata->name}}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Pengunjung Dewasa </div>
                        <div class="col-md-5 ms-auto">{{$data->jumlah_dewasa}} </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Pengunjung Anak - Anak</div>
                        <div class="col-md-5 ms-auto">{{$data->jumlah_anak}}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Harga Tiket</div>
                        <div class="col-md-5 ms-auto">Rp. {{number_format($data->wisata->price)}}</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Total Bayar</div>
                        <div class="col-md-5 ms-auto">
                            <?php
                            $total_harga = $data->wisata->price * $data->jumlah_dewasa + (($data->wisata->price * $data->jumlah_anak) / 2);
                            ?>Rp. {{number_format($total_harga)}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-5">Gambar Wisata</div>
                        <div class="col-md-5 ms-auto"><img src="{{ url('img/wisata/'.$data->wisata->file) }}"
                                width="150px" alt=""></div>
                    </div><br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection