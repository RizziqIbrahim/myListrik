<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use Validator;

class TarifController extends Controller
{
    //fungsi tampilan + get data tarif
    public function index(Request $request)
    {
        $tarif = Tarif::all();
        return view('tarif', compact('tarif'));
    }
    //fungsi tampilan create data tarif
    public function create(Request $request)
    {
        $tarif = Tarif::all();
        return view('addtarif', compact('tarif'));
    }

    //proses tambah data
    public function store(Request $request)
    {
        $rules = array(
            'daya' => 'required|integer',
            'tarifperkwh' => 'required|integer',

        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return response()->json([
                'message' => $errorString
            ], 401);
        }else{
            $tarif = Tarif::create([
                'daya' => $request->daya,
                'tarifperkwh' => $request->tarifperkwh,
            ]);

            return redirect()->route('tarif')->with("success", "success membuat data");
        }
    }

    //fungsi tampilan edit
    public function edit(Request $request, $id)
    {
        $tarif = Tarif::where('id', $id)->first();
        return view('edittarif', compact('tarif'));
    }
    
    //proses edit data tarif
    public function update(Request $request)
    {
        $tarif = Tarif::where('id', $request->id)->update([
            'id' => $request->id,
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);
        return redirect()->route('tarif')->with("success", "success mengedit data");
    }

    //proses delete data tarif
    public function destroy($id)
    {
        Tarif::where("id", $id)->delete();
        return redirect()->route('tarif')->with("success", "success menghapus data");
    }
}
