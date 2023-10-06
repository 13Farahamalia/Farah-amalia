<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
    public function index()
    {
        $drug = Drugs::all();
        return view('home', compact('drug'));
    }

    public function addDrug()
    {
        return view('addDrug');
    }

    public function insert(Request $request)
    {
        $drug = new Drugs;
        $drug->obat = $request->obat;
        $drug->fungsi = $request->keterangan;
        $drug->dosis = $request->dosis;
        $drug->stok = $request->stok;
        $drug->exp = $request->exp;
        $drug->save();
        return redirect()->route('beranda')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Drugs $drugs, $id)
    {
        $drug = Drugs::find($id);
        return view('editDrug',compact('drug'));
    }

    public function update(Request $request, $id)
    {
        $drug = Drugs::find($id);
        $drug->update([
            'obat' => $request->input('obat'),
            'fungsi' => $request->input('keterangan'),
            'dosis' => $request->input('dosis'),
            'stok' => $request->input('stok'),
            'exp' => $request->input('exp')
        ]);

        return redirect()->route('beranda')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drugs $drugs, $id)
    {
        $drug = $drugs::find($id);
        $drug->delete();

        return redirect()->route('beranda')->with('success','Data obat '.$drug->obat.' berhasil dihapus!');
        // return redirect()->route('beranda')->with('question','Apakah anda ingin menghapus data obat'.$drug->obat.'?');
    }
}
