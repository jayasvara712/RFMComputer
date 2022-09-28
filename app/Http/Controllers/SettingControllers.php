<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.user.setting', [
            'title' => 'setting',
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
            return redirect('/')->with('success', 'Data Karyawan Berhasil Diganti!');
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
        //
    }
}
