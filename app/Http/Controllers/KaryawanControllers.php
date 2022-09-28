<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KaryawanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemilik.karyawan.index', [
            'title' => 'Karyawan',
            'user' => User::where('role', 'admin')->get()->sortBy('nama_karyawan')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilik.karyawan.create', [
            'title' => 'Karyawan'
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
            'nama' => 'required|max:255',
            'username'  => ['required', 'min:3', 'max:255', 'unique:users'],
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|max:255',
            'no_telp'   => 'min:10|max:11',
            'role'      => 'required',
            'foto'      => 'image|file|max:1024',
        ]);

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('asset-gambar');
        }

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/pemilik/karyawan')->with('success', 'Data Karyawan Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pemilik.karyawan.show', [
            'user' => User::where('id_user', $user)->get()
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
        $user = User::findOrFail($id);
        return view('pemilik.karyawan.edit', [
            'title' => 'Karyawan',
            'user' => $user
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
        $user = User::findOrFail($id);
        $validateData = $request->validate([
            'nama'              => 'required|max:255',
            'username'          => ['required', 'min:3', 'max:255'],
            'email'             => 'required|email',
            'password'          => 'required',
            'no_telp'           => 'min:10|max:11',
            'role'              => 'required',
            'foto'              => 'image|file|max:1024',
        ]);

        $checking = $request->validate([
            'old_password'      => 'required',
            'password'          => 'required',
            'password_confirm'  => 'required|same:password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $validateData['password'] = Hash::make($validateData['password']);

            if ($request->file('foto')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validateData['foto'] = $request->file('foto')->store('asset-gambar');
            }
            User::where('id_user', $user->id_user)
                ->update($validateData);
            return redirect('/pemilik/karyawan')->with('success', 'Data Karyawan Berhasil Diubah!');
        } else {
            return back()->withErrors('Password lama tidak sesuai!');
        }
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
            $user = User::findOrFail($id);
            if ($user->foto) {
                Storage::delete($user->foto);
            }
            User::destroy($user->id_user);

            $result_msg = "Data Karyawan Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
