<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\Artikel;
use App\Models\gallery;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikelall=Artikel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(5);
        $artikel=Artikel::orderBy('created_at', 'desc')->paginate(5);
        $kategori=Kategori::orderBy('created_at', 'desc')->paginate(5);
        $user=User::all();
        $artikelno = Artikel::all();
        $kategorino = Kategori::all();
        $album=album::all();
        $gallery=gallery::all();
        
        return view('back.dashboard',compact('artikel','artikelall','kategori','user','album','gallery','artikelno','kategorino'));

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery=gallery::find($id);
        $artikel=Artikel::find($id);
        $user = User::findOrFail($id);
        $album=album::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
