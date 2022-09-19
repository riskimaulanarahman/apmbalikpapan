<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RT;


class RtController extends Controller
{
    public function index()
    {
        $kelurahan = RT::all();

        return response()->json(['status' => 'success', 'data' => $kelurahan]);
    }

    public function store(Request $request)
    {
        return RT::create([
            'nomor_rt' => $request->nomor_rt,
            'alamat' => $request->alamat,
         ]);
    }

    public function update(Request $request, $id)
    {
        $kelurahan = RT::findOrFail($id);
        $kelurahan->update($request->all());
    }

    public function destroy($id)
    {
        $kelurahan = RT::findOrFail($id);
        $kelurahan->delete();
        return response()->json([
         'message' => 'kelurahan deleted successfully'
        ]);
    }
}
