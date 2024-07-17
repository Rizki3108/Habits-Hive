<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::orderBy('id', 'desc')->get();
        return view('artikels.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('artikels.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->id_kategori = $request->id_kategori;
        $artikel->image = $request->image;

        //upload image
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->image = $name;
        }
        
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        return view('artikels.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikels.edit', compact('artikel', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->id_kategori = $request->id_kategori;

        if ($request->hasFile('image')) {
            $artikel->deleteImage();
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->image = $name;

        }
        $artikel -> save();
        return redirect()->route('artikel.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
