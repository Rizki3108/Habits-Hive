<?php

namespace App\Http\Controllers;

use App\Models\Pengingat;
use Illuminate\Http\Request;

class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengingat = Pengingat::orderBy('id', 'desc')->get();
        return view('pengingats.index', compact('pengingat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengingats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengingat = new Pengingat;
        $pengingat->judul_pengingat = $request->judul_pengingat;
        $pengingat->deskripsi = $request->deskripsi;
        $pengingat->tanggal = $request->tanggal;
        $pengingat->image = $request->image;

        //upload image
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/pengingat', $name);
            $pengingat->image = $name;
        }

        $pengingat->save();
        return redirect()->route('pengingat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengingat  $pengingat
     * @return \Illuminate\Http\Response
     */
    public function show(Pengingat $pengingat)
    {
        return view('pengingats.show', compact('pengingat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengingat  $pengingat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengingat $pengingat)
    {
        return view('pengingats.edit', compact('pengingat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengingat  $pengingat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengingat = Pengingat::findOrFail($id);
        $pengingat->judul_pengingat = $request->judul_pengingat;
        $pengingat->deskripsi = $request->deskripsi;
        $pengingat->tanggal = $request->tanggal;
        $pengingat->image = $request->image;

        if ($request->hasFile('image')) {
            $pengingat->deleteImage();
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/pengingat', $name);
            $pengingat->image = $name;
        }

        // catatan_id diizinkan null
        $pengingat->catatan_id = $request->catatan_id ?? null;

        $pengingat->save();
        return redirect()->route('pengingat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengingat  $pengingat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengingat = Pengingat::findOrFail($id);
        $pengingat->delete();
        return redirect()->route('pengingat.index');
    }
}
