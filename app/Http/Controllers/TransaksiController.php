<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('wisata')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::with('wisata')->get();
        $wisata = Wisata::all();
        return view('transaksi.add', compact('wisata', 'transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Transaksi();
        $data->id               = Uuid::uuid4()->getHex();
        $data->name             = $request->name;
        $data->noId             = $request->noId;
        $data->telp             = $request->telp;
        $data->id_wisata        = $request->id_wisata;
        $data->tgl_kunjungan    = $request->tgl_kunjungan;
        $data->jumlah_dewasa    = $request->jumlah_dewasa;
        $data->jumlah_anak      = $request->jumlah_anak;
        $data->save();
        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi, $id)
    {
        try {
            $data = Transaksi::find($id);
            $data->delete();
            return redirect('transaksi');
        } catch (\throwable $th) {
            return redirect('transaksi');
        }
    }
}