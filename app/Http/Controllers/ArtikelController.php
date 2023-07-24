<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(8);
        return view ('back.artikel.index',[
            'artikel'=> $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('back.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required|min:4',
            
        ]);
        $data = $request->all();
        $data['slug']=Str::slug($request->judul);
        $data['user_id']=Auth::id();
        $data['views']=0;
        

        if ($request->file('dokumen') == null) {
            $file = "";
        }else{
            $data['dokumen'] = $request->file('dokumen')->store('dokumen');  
        }
        $data['gambar_artikel']=$request->file('gambar_artikel')->store('artikel');
       

        

        Artikel::create($data);
        Alert::success('Berhasil', 'Data Telah Ditambahkan!');
        return redirect ()->route('artikel.index');
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
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        
        return view('back.artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$this->validate($request,[
            //'judul'=>'required|min:4',
        //]);

        if(empty($request->file('gambar_artikel'))){
            $artikel = Artikel::find($id);
            $artikel ->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('artikel.index');
        }if(empty($request->file('dokumen'))){
            $artikel = Artikel::find($id);
            $artikel ->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('artikel.index');
        }else{
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            Storage::delete($artikel->dokumen);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
                'dokumen' => $request->file('dokumen')->store('dokumen'),
               
                
            ]);
            Alert::info('Info', 'Data Telah Diperbarui!');
            return redirect ()->route('artikel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $artikel = artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        if ($artikel->dokumen == null) {
            $file = "";
        }else{
            Storage::delete($artikel->dokumen);
        }

        $artikel->delete();
        Alert::info('Info', 'Data Telah Dihapus!');
        return redirect()->route('artikel.index');
    }
}
