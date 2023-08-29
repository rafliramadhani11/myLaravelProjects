<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.kategoris.index', [
            'title' => 'Detikcom',
            'kategoris' => Kategori::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategoris.create', [
            'title' => 'Detikcom'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Kategori $kategori)
    {
        Kategori::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'slug' => $request->slug
        ]);

        return redirect('/dashboard/kategoris');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategoris.edit',[
            'title' => 'Detikcom',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        Kategori::where('id', $kategori->id)->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'slug' => $request->slug
        ]);

        return redirect('/dashboard/kategoris');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/dashboard/kategoris')->with('success', 'Kategori Telah di Hapus !');
    }
}
