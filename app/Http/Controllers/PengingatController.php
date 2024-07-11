<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
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
        $catatan = Catatan::orderBy('id', 'desc')->get();
        return view('pengingats.index', compact('catatan'));
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
        $catatan = new Catatan;
        $catatan->judul_catatan = $request->judul_catatan;
        $catatan->deksripsi = $request->deskripsi;
        $catatan->tanggal = $request->pengingat;
        $catatan->image = $request->image;

        //upload image
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/catatan', $name);
            $catatan->image = $name;
        }

        $catatan->save();
        return redirect()->route('pengingat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        return view('pengingats.show', compact('catatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catatan)
    {
        return view('pengingats.edit', compact('catatan'));
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
        $catatan->tanggal = $request->pengingat;
        $catatan->image = $request->image;

        if ($request->hasFile('image')) {
            $catatan->deleteImage();
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/catatan', $name);
            $catatan->image = $name;
        }
        $catatan->save();
        return redirect()->route('pengingat.index');
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
        return redirect()->route('pengingat.index');
    }
}
