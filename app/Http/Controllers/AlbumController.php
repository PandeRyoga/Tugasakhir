<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::latest()->paginate(8);
        return view('back.album.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $album = Album::all();
        return view('back.album.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_album'=>'required|min:4',
        ]);
      
        $data = $request->all();

        $data['gambar_album']=$request->file('gambar_album')->store('album');
        Album::create($data);
        Alert::success('Berhasil', 'Data Telah Ditambahkan!');
        return redirect ()->route('album.index');
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
        $album = Album::find($id);
        return view('back.album.edit',[
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_album'))){
            $album = Album::find($id);
            $album ->update([
                'nama_album' => $request->nama_album,
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('album.index');
        }else{
            $album = Album::find($id);
            Storage::delete($album->gambar_album);
            $album->update([
                'nama_album' => $request->nama_album,
                'gambar_album' => $request->file('gambar_album')->store('album'),
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('album.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::find($id);
        Storage::delete($album->gambar_album);
        $album->delete();
        Alert::info('Info', 'Data Telah Dihapus!');
        return redirect()->route('album.index');
    }
}
