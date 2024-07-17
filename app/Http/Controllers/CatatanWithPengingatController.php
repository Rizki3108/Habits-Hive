<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Pengingat;
use Illuminate\Http\Request;

class CatatanWithPengingatController extends Controller
{
    public function create()
    {
        return view('catatans.create_with_pengingat_');
    }

    public function store(Request $request)
    {
        $catatan = new Catatan;
        $catatan->judul_catatan = $request->judul_catatan;
        $catatan->deksripsi = $request->deskripsi;
        $catatan->tanggal = $request->tanggal;
        $catatan->image = $request->image;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/catatan', $name);
            $catatan->image = $name;
        }

        $catatan->save();

        if ($request->tanggal) {
            $pengingat = new Pengingat;
            $pengingat->judul_pengingat = $request->judul_catatan;
            $pengingat->deskripsi = $request->deskripsi;
            $pengingat->tanggal = $request->tanggal;
            $pengingat->catatan_id = $catatan->id;

            if ($request->hasFile('image')) {
                $pengingat->image = $catatan->image;
            }

            $pengingat->save();
        }

        return redirect()->route('catatan.index');
    }
}
