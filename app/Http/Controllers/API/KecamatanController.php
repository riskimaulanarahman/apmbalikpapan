<?php

namespace App\Http\Controllers\API;

use App\Model\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();

        return response()->json(['status' => 'success', 'data' => $kecamatan]);
    }

    public function store(Request $request)
    {
        return Kecamatan::create([
           'kode_kecamatan' => $request->kode_kecamatan,
           'nama_kecamatan' => $request->nama_kecamatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update($request->all());
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return response()->json([
         'message' => 'kecamatan deleted successfully'
        ]);
    }
    

}
