<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;

class BarangControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang.index', [
            'title' => 'Barang',
            'barang' => Barang::with('jenis', 'satuan')->get()->sortBy('nama_barang')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('barang')->select(DB::raw('MAX(RIGHT(kode_barang,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('admin.barang.create', [
            'title' => 'Barang',
            'jenis' => Jenis::all(),
            'satuan' => Satuan::all(),
            'kd' => $kd,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_barang' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'id_jenis' => 'required',
            'id_satuan' => 'required',
            'gambar' => 'required|image|file|max:1024'
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('asset-gambar');
        }

        Barang::create($validateData);

        return redirect('/admin/barang')->with('success', 'Data Barang Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', [
            'title' => 'Barang',
            'barang' => $barang,
            'jenis' => Jenis::all(),
            'satuan' => Satuan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $validateData = $request->validate([
            'kode_barang' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'id_jenis' => 'required',
            'id_satuan' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);


        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('asset-gambar');
        }

        Barang::where('id_barang', $barang->id_barang)
            ->update($validateData);

        return redirect('/admin/barang')->with('success', 'Data Barang Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res_code = 500; //500 for internal error
        $err_msg = "";
        $result_msg = "";
        try {
            $barang = Barang::findOrFail($id);
            if ($barang->gambar) {
                Storage::delete($barang->gambar);
            }
            Barang::destroy($barang->id_barang);
            $result_msg = "Data Barang Berhasil Di Hapus";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = "error, Gagal Hapus!";
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
