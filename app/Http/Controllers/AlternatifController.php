<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        // $alternatif = Alternatif::where('id', $id)->first();

        // return view('editalternatif', [
        //     'alternatif' => $alternatif,
        //     'title' => 'Edit Data alternatif'
        // ]);
        return view('editalternatif')->with([
            'alternatif' => Alternatif::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $alternatif1      = $request->input('alternatif');
        $jenis_tanaman1   = $request->input('jenis_tanaman');
        $jenis_tanah1 = $request->input('jenis_tanah');
        $kondisi_tanah1 = $request->input('kondisi_tanah');
        $harga_pupuk1 = $request->input('harga_pupuk');
        $kadar_air1 = $request->input('kadar_air');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->alternatif    = $alternatif1;
        $alternatif->jenis_tanaman = $jenis_tanaman1;
        $alternatif->jenis_tanah = $jenis_tanah1;
        $alternatif->kondisi_tanah = $kondisi_tanah1;
        $alternatif->harga_pupuk = $harga_pupuk1;
        $alternatif->kadar_air = $kadar_air1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $alternatif1 = $request->input('alternatif');
        $jenis_tanaman1 = $request->input('jenis_tanaman');
        $jenis_tanah1 = $request->input('jenis_tanah');
        $kondisi_tanah1 = $request->input('kondisi_tanah');
        $harga_pupuk1 = $request->input('harga_pupuk');
        $kadar_air1 = $request->input('kadar_air');

        $alternatif = new Alternatif;
        $alternatif->alternatif    = $alternatif1;
        $alternatif->jenis_tanaman = $jenis_tanaman1;
        $alternatif->jenis_tanah = $jenis_tanah1;
        $alternatif->kondisi_tanah = $kondisi_tanah1;
        $alternatif->harga_pupuk = $harga_pupuk1;
        $alternatif->kadar_air = $kadar_air1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
