<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Models\Stock;
use DB;
use Illuminate\Support\Arr;

class BarangMasukControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang_masuk.index', [
            'title' => 'Barang Masuk',
            'barang_masuk' => BarangMasuk::with('barang')->get()->sortBy('barang.nama_barang')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.barang_masuk.create', [
            'title' => 'Barang Masuk',
            'barang' => Barang::all()
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
        $message = 'Data Barang Masuk Berhasil Di Simpan!';
        // DB::beginTransaction();
        // try {
        //     $validateData = $request->validate([
        //         'id_user' => 'required',
        //         'id_barang' => 'required|max:255',
        //         'jumlah_masuk' => 'required',
        //         'tanggal_masuk' => 'required'
        //     ]);

        //     BarangMasuk::create($validateData);

        //     $stockDBData = Stock::where('id_barang', '=', $request->id_barang)->first();
        //     if ($stockDBData) {
        //         $stockDBData->stock += $request->jumlah_masuk;
        //         $stockDBData->save();
        //     } else {
        //         $stockNew = Stock::create([
        //             'id_barang' => $request->id_barang,
        //             'stock' => $request->jumlah_masuk,
        //             'tanggal' =>  $request->tanggal_masuk,
        //         ]);
        //     }

        //     DB::commit();
        // } catch (\Exception $ex) {
        //     DB::rollback();
        //     $message = $ex->getMessage();
        // }
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required|max:255',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        BarangMasuk::create($validateData);

        $stockDBData = Stock::where('id_barang', '=', $request->id_barang)->first();
        if ($stockDBData) {
            $stockDBData->stock += $request->jumlah_masuk;
            $stockDBData->save();
        } else {
            $stockNew = Stock::create([
                'id_barang' => $request->id_barang,
                'stock' => $request->jumlah_masuk,
                'tanggal' =>  $request->tanggal_masuk,
            ]);
        }

        return redirect('/admin/barang_masuk')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        return view('admin.barang_masuk.show', [
            'barang_masuk' => $barang_masuk
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
        $barang_masuk = BarangMasuk::findOrFail($id);
        return view('admin.barang_masuk.edit', [
            'title' => 'Barang Masuk',
            'barang_masuk' => $barang_masuk,
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
        $barang_masuk = BarangMasuk::findOrFail($id);
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required|max:255',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        BarangMasuk::where('id_barang_masuk', $barang_masuk->id_barang_masuk)->update($validateData);

        $stockDBData = Stock::where('id_barang', '=', $request->id_barang)->first();
        $stockDBData->stock = $request->total_stok;
        $stockDBData->save();

        return redirect('/admin/barang_masuk')->with('success', 'Data Barang Masuk Berhasil Di Ubah!');
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
            $barang_masuk = BarangMasuk::findOrFail($id);
            $jml_brg = $barang_masuk->jumlah_masuk;

            $stockDBData = Stock::where('id_barang', '=', $barang_masuk->id_barang)->first();
            $stockDBData->stock -= $jml_brg;
            $stockDBData->save();

            BarangMasuk::destroy($barang_masuk->id_barang_masuk);

            $result_msg = "Data Barang Masuk Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
