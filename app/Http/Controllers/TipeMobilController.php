<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeMobil;
use Symfony\Contracts\Service\Attribute\Required;

class TipeMobilController extends Controller
{
    //menampil data
    function index()
    {
        $tipeMobilData = TipeMobil::all();
        return view('pages.tipe_mobil.index', compact('tipeMobilData'));
    }

    //tambah data
    function create()
    {
        return view('pages.tipe_mobil.create');
    }

    function store(Request $request)
    {
        //validasi data yang mau disimpan
        $tipeMobilData = $request->validate([
            'tipe' => 'required'
        ]);

        //proses simpan data
        TipeMobil::create($tipeMobilData);

        //mengalihkan kehalaman index tipemoibil
        return redirect()->to('/tipemobil');
    }

    //mengubah data
    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipe_mobil.edit', compact('tipeMobilData'));
    }

    function update($id, Request $request)
    {
        //validasi data
        $validasiTipeMobil = $request->validate([
            'tipe' => 'required'
        ]);

        //cari data berdasarkan id kemudian lakukan update
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->update($validasiTipeMobil);

        //balik halaman sebelumnya
        return redirect()->to('/tipemobil');
    }

    //meghapus data
    function delete($id)
    {
        //ambil data berdasarkan id
        //lakukan delete data
        //balik ke halaman sebelumnya
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->delete();
        return redirect()->to('/tipemobil');
    }
}
