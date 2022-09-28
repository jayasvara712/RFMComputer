<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.satuan.index', [
            'title' => 'Satuan',
            'satuan' => Satuan::all()->sortBy('nama_jenis')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.satuan.create', [
            'title' => 'Satuan',
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
            'nama_satuan' => 'required|max:255'
        ]);

        Satuan::create($validateData);

        return redirect('/admin/satuan')->with('success', 'Data Satuan Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.show', [
            'satuan' => Satuan::where('id_satuan', $satuan)->get()
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
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', [
            'title' => 'Satuan',
            'satuan' => $satuan
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
        $satuan = Satuan::findOrFail($id);
        $validateData = $request->validate([
            'nama_satuan' => 'required|max:255'
        ]);

        Satuan::where('id_satuan', $satuan->id_satuan)
            ->update($validateData);

        return redirect('/admin/satuan')->with('success', 'Data Satuan Berhasil Di Ubah!');
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
            $satuan = Satuan::findOrFail($id);
            Satuan::destroy($satuan->id_satuan);

            $result_msg = "Data Satuan Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
