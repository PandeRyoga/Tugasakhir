<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = gallery::latest()->paginate(8);
        return view('back.gallery.index',[
            'gallery'=>$gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $album = album::all();
        return view('back.gallery.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto_gallery']=$request->file('foto_gallery')->store('gallery');
        gallery::create($data);
        Alert::success('Berhasil', 'Data Telah Ditambahkan!');
        return redirect ()->route('gallery.index');
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
        $gallery = gallery::find($id);
        $album = album::all();
        
        return view('back.gallery.edit', [
            'gallery' => $gallery,
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('foto_artikel'))){
            $gallery=gallery::find($id);
            $gallery->update([
                'nama_album'=>$request->nama_album,
                'foto_gallery' => $request->file('foto_gallery')->store('gallery'),
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('gallery.index');
             
        } else {
            $gallery=gallery::find($id);
            Storage::delete($gallery->foto_gallery);
            $gallery->update([
                'nama_album'=>$request->nama_album,
                // 'foto_gallery' => $request->file('foto_gallery')->store('gallery'),
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('gallery.index');
            
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = gallery::find($id);
        Storage::delete($gallery->foto_gallery);
        $gallery->delete();
        Alert::info('Info', 'Data Telah Dihapus!');
        return redirect()->route('gallery.index');
    }
}
