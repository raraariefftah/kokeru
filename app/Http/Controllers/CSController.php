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
        //
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
        //
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
