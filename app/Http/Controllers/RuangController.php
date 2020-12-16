<?php

namespace App\Http\Controllers;

use App\Ruang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ruang = DB::table('ruang')->get();

        return view('manager.daftar_ruang', ['rooms' => $ruang]);
    }

    public function create()
    {
        return view('manager.tambah_ruang');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
        ],
            [
                'nama.required' => 'Silahkan isi nama ruang.',
            ])->validate();

        DB::table('ruang')->insert([
            'nama_ruang' => $request->nama,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('daftar_ruang')
            ->with('success', 'Ruang berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ruang = Ruang::find($id);

        return view('manager.edit_ruang', compact('ruang'));
    }

    public function update(Request $request, $id)
    {


        $ruang = Ruang::find($id);
        $ruang->update([
                'nama_ruang' => $request->nama,
            ]
        );
        return redirect()->route('daftar_ruang')
            ->with('success', 'Ruang berhasil diubah.');
    }

    public function destroy($id)
    {
        $ruang = Ruang::where('id_ruang',$id);
        $ruang->delete();
        return redirect()->route('daftar_ruang')
            ->with('success', 'Ruang berhasil dihapus.');
    }
}
