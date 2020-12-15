<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|alpha_num'
        ],
            [
                'nama.required' => 'Silahkan isi nama CS',
                'email.required' => 'Silahkan isi email',
                'email.email' => 'Silahkan isi email dengan benar',
                'no_hp.required' => 'Silahkan isi no hp',
                'no_hp.alpha_num' => 'Silahkan isi no hp dengan benar',
            ])->validate();


        DB::table('users')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->email),
            'role' => 'cs',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
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

    public function edit_profil($id)
    {
//        $cs = DB::table('users')
//            ->where('id_user', '=', $id)
//            ->first();
//        dd($cs);
        $cs = User::find($id);

        return view('cs.edit_profil', compact('cs'));
    }

    public function update_profil(Request $request, $id)
    {
        $cs = User::find($id);
        $inputpass = Hash::check($request->password, $cs->password);
        if ($inputpass)
        {
            $cs->update([
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                ]
            );

            return back()
                ->with('success', 'Data Anda berhasil diubah.');
        } else {
            return back()
                ->with('failed', 'Password yang Anda masukkan salah.')->withInput();
        }
    }
}
