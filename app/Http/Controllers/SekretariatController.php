<?php

namespace App\Http\Controllers;

// use App\Models\Sekretariat;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SekretariatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('back.sekretariat.index',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('back.sekretariat.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $user = User :: create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'level' =>$request->level,
        ]);
        Alert::success('Berhasil', 'Data Telah Ditambahkan!');
        return redirect ()->route('sekretariat.index');
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
        $user = User::find($id);
        
        
        return view('back.sekretariat.edit', [
            'user' => $user,
           
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
       
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'level' => $request->level,
        ]);
        Alert::info('Info', 'Data Telah Diperbarui!');
        return redirect()->route('sekretariat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::info('Info', 'Data Telah Dihapus!');
        return redirect()->route('sekretariat.index');

    }
}
