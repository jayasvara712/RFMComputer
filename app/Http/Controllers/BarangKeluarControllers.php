<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang_keluar.index', [
            'title' => 'Barang Keluar',
            'barang_keluar' => BarangKeluar::with('barang')->get()->sortBy('barang.nama_barang')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang_keluar.create', [
            'title' => 'Barang Keluar',
            'barang' => Barang::all()->sortBy('nama_barang')
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
            'id_user' => 'required',
            'id_barang' => 'required|max:255',
            'jumlah_keluar' => 'required',
            'tanggal_keluar' => 'required'
        ]);

        BarangKeluar::create($validateData);

        $stockDBData = Stock::where('id_barang', '=', $request->id_barang)->first();
        $stockDBData->stock -= $request->jumlah_keluar;
        $stockDBData->save();

        return redirect('/admin/barang_keluar')->with('success', 'Data Barang Keluar Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_keluar = BarangKeluar::findOrFail($id);
        return view('admin.barang_keluar.show', [
            'barang_keluar' => $barang_keluar
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
        $barang_keluar = BarangKeluar::findOrFail($id);
        return view('admin.barang_keluar.edit', [
            'title' => 'Barang Keluar',
            'barang_keluar' => $barang_keluar,
            'barang' => Barang::all()
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
        $barang_keluar = BarangKeluar::findOrFail($id);
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required|max:255',
            'jumlah_keluar' => 'required',
            'tanggal_keluar' => 'required'
        ]);

        BarangKeluar::where('id_barang_keluar', $barang_keluar->id_barang_keluar)->update($validateData);

        $stockDBData = Stock::where('id_barang', '=', $request->id_barang)->first();
        $stockDBData->stock = $request->total_stok;
        $stockDBData->save();

        return redirect('/admin/barang_keluar')->with('success', 'Data Barang Keluar Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $res_code = 500; //500 for internal error
        $err_msg = "";
        $result_msg = "";
        try {
            $barang_keluar = BarangKeluar::findOrFail($id);
            $jml_brg = $barang_keluar->jumlah_keluar;

            $stockDBData = Stock::where('id_barang', '=', $barang_keluar->id_barang)->first();
            $stockDBData->stock += $jml_brg;
            $stockDBData->save();

            BarangKeluar::destroy($barang_keluar->id_barang_keluar);

            $result_msg = "Data Barang Keluar Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
