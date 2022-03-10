<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\Pelanggan;
use Validator;

class PenggunaanController extends Controller
{  
    //function tampilan + get penggunaan
    public function index(Request $request)
    {
        $penggunaan = Penggunaan::all();
        return view('penggunaan', compact('penggunaan'));
    }

    //function tampilan add penggunaan
    public function create(Request $request)
    {
        $penggunaan = Penggunaan::all();
        return view('addpenggunaan', compact('penggunaan'));
    }

    //proses tambah data Penggunaan
    public function store(Request $request)
    {
        $rules = array(
            'id_pelanggan' => 'required|integer',
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
            'meter_awal' => 'required|integer',
            'meter_akhir' => 'required|integer',
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return response()->json([
                'message' => $errorString
            ], 401);
        }else{
            $penggunaan = Penggunaan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            ]);

            return redirect()->route('penggunaan')->with("success", "success membuat data");
        }
    }

    //function tampilan edit 
    public function edit(Request $request, $id)
    {
        $penggunaan = Penggunaan::where('id', $id)->first();
        return view('editpenggunaan', compact('penggunaan'));
    }

    //proses edit data Penggunaan
    public function update(Request $request)
    {
        $penggunaan = Penggunaan::where('id', $request->id)->update([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);
        return redirect()->route('penggunaan')->with("success", "success mengedit data");
    }

    //proses delete data penggunaan
    public function destroy($id)
    {
        Penggunaan::where("id", $id)->delete();
        return redirect()->route('penggunaan')->with("success", "success menghapus data");
    }
}
