<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class WisataController extends Controller
{

    // Query menampilkan data
    public function index()
    {
        $wisata = Wisata::all();
        return view('wisata.index', compact('wisata'));
    }


    // Membuka halaman tambah wisata
    public function create()
    {
        return view('wisata.add');
    }


    // Query Memasukkan data yang sudah ditambahkan 
    public function store(Request $request)
    {
        $data           = new Wisata();
        $data->id       = Uuid::uuid4()->getHex();
        $data->name     = $request->name;
        $data->location = $request->location;
        $data->price    = $request->price;

        $file           = $request->file('file');
        $new_name       = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/wisata/'), $new_name);
        $data->file     = $new_name;

        $data->save();
        return redirect('wisata');
    }



    // Membuka tampilan edit
    public function edit(wisata $wisata, $id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('wisata.edit', compact('wisata'));
    }

    //Query update data
    public function update(Request $request, $id)
    {
        $data           = Wisata::findOrFail($id);
        $data->name     = $request->name;
        $data->location = $request->location;
        $data->price    = $request->price;

        if (empty($request->file('file'))) {
            # code...
            $data->file = $data->file;
        } else {
            # code...
            $file       = $request->file('file');
            $new_name   = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/wisata/'), $new_name);
            $data->file = $new_name;
        }

        $data->update();

        return redirect('wisata');
    }

    //Query menghapus data
    public function destroy(wisata $wisata, $id)
    {
        try {
            $data = Wisata::find($id);
            $data->delete();
            return redirect('wisata');
        } catch (\throwable $th) {
            return redirect('wisata');
        }
    }
}