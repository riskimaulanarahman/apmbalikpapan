<?php

namespace App\Http\Controllers\API;

use App\Model\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::all();

        return response()->json(['status' => 'success', 'data' => $kelurahan]);
    }

    public function store(Request $request)
    {
        return Kelurahan::create([
            'kode_kecamatan' => $request->kode_kecamatan,
            'kode_kelurahan' => $request->kode_kelurahan,
            'nama_kelurahan' => $request->nama_kelurahan
         ]);
    }

    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($request->all());
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return response()->json([
         'message' => 'kelurahan deleted successfully'
        ]);
    }


}
