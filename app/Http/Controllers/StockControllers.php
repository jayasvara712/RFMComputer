<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;

class StockControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stock.index', [
            'title' => 'Stock',
            'stock' => Stock::with('barang')->get()->sortBy('barang.nama_barang')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create', [
            'title' => 'Stock',
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
        $validateData = $request->validate([
            'id_barang' => 'required|unique:stock,id_barang',
            'stock' => 'required',
            'tanggal' => 'required',
        ]);

        Stock::create($validateData);

        return redirect('/admin/stock')->with('success', 'Data Stock Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stock.show', [
            'stock' => $stock
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
        $stock = Stock::findOrFail($id);
        return view('admin.stock.edit', [
            'title' => 'Stock',
            'stock' => $stock,
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
        $stock = Stock::findOrFail($id);
        $validateData = $request->validate([
            'id_barang' => 'required',
            'stock' => 'required',
            'tanggal' => 'required'
        ]);

        Stock::where('id_stock', $stock->id_stock)
            ->update($validateData);

        return redirect('/admin/stock')->with('success', 'Data Stock Berhasil Di Ubah!');
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
            $stock = Stock::findOrFail($id);
            BarangMasuk::where('id_barang', $stock->id_barang)->delete();
            BarangKeluar::where('id_barang', $stock->id_barang)->delete();
            Stock::destroy($stock->id_stock);
            $result_msg = "Data Stock Berhasil Di Hapus";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = "error, Gagal Hapus!";
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
