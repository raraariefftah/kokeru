<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CSController extends Controller
{
    public function index()
    {
        $cs = DB::table('users')
            ->where('role', '=', 'cs')
            ->get();

        return view('manager.daftar_cs', ['cs' => $cs]);
    }

    public function create()
    {
        return view('manager.tambah_data_cs');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'nama' => 'required',
//            'email' => 'required|email',
//            'no_hp' => 'required|alpha_num'
//        ]);

        DB::table('users')->insert([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->email),
                'role' => 'cs',
                ]
        );

        return redirect()->route('daftar_cs')
            ->with('success','Data CS berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cs = DB::table('users')
            ->where('id_user', '=', $id)
            ->first();
//        dd($cs);

        return view('manager.edit_data_cs', compact('cs'));
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id_user', '=', $id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]
        );

        return redirect()->route('daftar_cs')
            ->with('success','Data CS berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id_user', '=', $id)->delete();

        return redirect()->route('daftar_cs')
            ->with('success','Data CS berhasil dihapus.');
    }
}
