<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori::all();
        return view('back.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kategori' => 'required|min:4',

        ]);
        $kategori = kategori :: create([
            'nama_kategori' => $request->nama_kategori,
            'slug' =>Str::slug($request->nama_kategori)
        ]);
        Alert::success('Berhasil', 'Data Telah Ditambahkan!');
        return redirect ()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategori::find($id);
        return view('back.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);
        $kategori = kategori::findOrFail($id);
        $kategori->update($data);
        Alert::info('Info', 'Data Telah Diperbarui!');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori::find($id);
        $kategori->delete();
        Alert::info('Info', 'Data Telah Dihapus!');
        return redirect()->route('kategori.index');

    }
}
