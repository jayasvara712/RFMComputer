<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis.index', [
            'title' => 'Jenis',
            'jenis' => Jenis::all()->sortBy('nama_jenis')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis.create', [
            'title' => 'Jenis',
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
            'nama_jenis' => 'required|max:255'
        ]);

        Jenis::create($validateData);

        return redirect('/admin/jenis')->with('success', 'Data Jenis Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.show', [
            'jenis' => Jenis::where('id_jenis', $jenis)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.edit', [
            'title' => 'Jenis',
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);
        $validateData = $request->validate([
            'nama_jenis' => 'required|max:255'
        ]);

        Jenis::where('id_jenis', $jenis->id_jenis)
            ->update($validateData);

        return redirect('/admin/jenis')->with('success', 'Data Jenis Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $res_code = 500; //500 for internal error
        $err_msg = "";
        $result_msg = "";
        try {
            $jenis = Jenis::findOrFail($id);
            Jenis::destroy($jenis->id_jenis);

            $result_msg = "Data Jenis Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
