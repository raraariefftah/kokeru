<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $cs = DB::table('users')
//            ->where('role', '=', 'cs')
//            ->get();
        $cs = User::where('role', 'cs')->get();


        return view('manager.daftar_cs', compact('cs'));
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
        ]);

//        $cs = User::make([
//            'nama' => $request->nama,
//            'email' => $request->email,
//            'no_hp' => $request->no_hp,
//            'password' => Hash::make($request->email),
//            'role' => 'cs',
//        ]);
//        $cs->save();

        return redirect()->route('daftar_cs')
            ->with('success', 'Data CS berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
//        $cs = DB::table('users')
//            ->where('id_user', '=', $id)
//            ->first();
//        dd($cs);
        $cs = User::find($id);

        return view('manager.edit_data_cs', compact('cs'));
    }

    public function update(Request $request, $id)
    {
//        DB::table('users')->where('id_user', '=', $id)
//            ->update([
//                    'nama' => $request->nama,
//                    'email' => $request->email,
//                    'no_hp' => $request->no_hp,
//                ]
//            );
        $cs = User::find($id);
        $cs->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]
        );

        return redirect()->route('daftar_cs')
            ->with('success', 'Data CS berhasil diubah.');
    }

    public function destroy($id)
    {
//        DB::table('users')->where('id_user', '=', $id)->delete();

        $cs = User::find($id);
        $cs->delete();

        return redirect()->route('daftar_cs')
            ->with('success', 'Data CS berhasil dihapus.');
    }
}
