<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Pengingat;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan = Catatan::orderBy('id', 'desc')->get();
        return view('catatans.index', compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catatan = new Catatan;
        $catatan->judul_catatan = $request->judul_catatan;
        $catatan->deksripsi = $request->deskripsi;
        $catatan->tanggal = $request->tanggal; // Menggunakan 'tanggal' untuk catatan
        $catatan->image = $request->image;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/catatan', $name);
            $catatan->image = $name;
        }

        $catatan->save();

        // Membuat pengingat baru jika tanggal ada
        if ($request->filled('tanggal')) {
            $pengingat = new Pengingat;
            $pengingat->judul_pengingat = $request->judul_catatan; // Menggunakan judul catatan untuk judul pengingat
            $pengingat->deskripsi = $request->deskripsi;
            $pengingat->tanggal = $request->tanggal;
            $pengingat->catatan_id = $catatan->id;
            
            if ($request->hasFile('image')) { // Use the same image from catatan
            $pengingat->image = $catatan->image;
        }

            $pengingat->save();
        }

        return redirect()->route('catatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        return view('catatans.show', compact('catatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catatan)
    {
        return view('catatans.edit', compact('catatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $catatan = Catatan::findOrFail($id);
    $catatan->judul_catatan = $request->judul_catatan;
    $catatan->deksripsi = $request->deskripsi;
    $catatan->tanggal = $request->tanggal;
    $catatan->image = $request->image;

    if ($request->hasFile('image')) {
        $catatan->deleteImage();
        $img = $request->file('image');
        $name = rand(1000, 9999) . $img->getClientOriginalName();
        $img->move('images/catatan', $name);
        $catatan->image = $name;
    }

    $catatan->save();

    // Update pengingat jika ada tanggal
    $pengingat = Pengingat::where('catatan_id', $catatan->id)->first();
    if ($request->tanggal) {
        if ($pengingat) {
            $pengingat->judul_pengingat = $request->judul_catatan;
            $pengingat->deskripsi = $request->deskripsi;
            $pengingat->tanggal = $request->tanggal;

            if ($request->hasFile('image')) { // Use the same image from catatan
                $pengingat->deleteImage();
                $pengingat->image = $catatan->image;
            }

            $pengingat->save();

        } else {
            $pengingat = new Pengingat;
            $pengingat->judul_pengingat = $request->judul_catatan;
            $pengingat->deskripsi = $request->deskripsi;
            $pengingat->tanggal = $request->tanggal;
            $pengingat->catatan_id = $catatan->id;

            if ($request->hasFile('image')) { // Use the same image from catatan
                $pengingat->image = $catatan->image;
            }

            $pengingat->save();
        }
    } elseif ($pengingat) {
        $pengingat->delete();
    }

    return redirect()->route('catatan.index');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();
        return redirect()->route('catatan.index');
    }
}
