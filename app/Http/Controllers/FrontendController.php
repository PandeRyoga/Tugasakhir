<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\gallery;
use App\Models\User;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = 6;
        $kategori = Kategori::all();
        $artikel = Artikel::where('is_active', 1)->orderBy('created_at', 'desc')->get()->random(2);
        $artikelall = Artikel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate($pagination);
        $artikelterkait = Artikel::where('is_active', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('frontend', [
            'kategori'=>$kategori,
            'artikel'=>$artikel,
            'artikelall'=>$artikelall,
             'artikelterkait'=>$artikelterkait
            ]);
    }

    public function detail($slug){
        $artikel = Artikel::where('slug', $slug)->first();
        $kategori = Kategori::withCount('Artikel')->get();
        $random = Artikel::where('is_active', 1)->latest()->get()->random(1);
        $kategoriall = Kategori::all();
   
   
        $user = User::all();
        
     

        return view('detail.artikel-detail',[
            'artikel' => $artikel,
            'kategori' => $kategori,
            'random' => $random,
            'user' => $user,
            'kategoriall' => $kategoriall,
         
       
        ]);
    }
    


    public function artikel_kategori($id)
    {
        $kategori = Artikel::where('kategori_id', $id)->where('is_active', 1)->orderBy('created_at', 'desc')->paginate(10);
        $kategoriall = Kategori::all();
        
        
       return view('detail.artikel-kategori',[
         'kategori'=> $kategori,
         'kategoriall' => $kategoriall
         
       ]);
    }


    public function album_index()
    {
        $album = album::orderBy('created_at', 'desc')->paginate(10);
        $kategoriall = Kategori::all();
        return view('detail.album-index',[
            'album'=>$album,
            'kategoriall' => $kategoriall
        ]);
    }

    public function album_detail($id)
    {
        $album = gallery::where('nama_album', $id)->get();
        $kategoriall = Kategori::all();
        return view('detail.album-detail',[
            'album'=>$album,
            'kategoriall' => $kategoriall
        ]);
    }

    public function tentang_index()
    {
        $kategoriall = Kategori::all();
        return view('detail.tentang-index',[
            'kategoriall' => $kategoriall
        ]);
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
    public function show(Artikel $artikel)
    {
        return $artikel;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
