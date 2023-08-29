<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDashboardBukuRequest;
use App\Http\Requests\UpdateDashboardBukuRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.myposts.index', [
            'title' => 'Semua Buku Saya',
            'bukus' => Buku::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.myposts.create',[
            'title' => 'Buat Data Baru',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardBukuRequest $request)
    {
        $rules = $request->all();
        if($request->file('coverBuku'))
        {
            $rules['coverBuku'] = $request->file('coverBuku')->store('coverBuku');
        }
        if($request->file('fileBuku'))
        {
            $rules['fileBuku'] = $request->file('fileBuku')->store();
        }

        $rules['user_id'] = auth()->user()->id;

        Buku::create($rules);
        return redirect('/dashboard/bukus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('dashboard.myposts.show',[
            'title' => 'Buku',
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('dashboard.myposts.edit', [
            'buku' => $buku,
            'title' => 'Ubah Data Buku',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardBukuRequest $request, Buku $buku)
    {
        // JIKA SLUG TIDAK SAMA DENGAN SLUG POST
        $rules = [
            'judul' => 'required|max:100',
            'deskripsi' => 'required|max:50',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required',
            'coverBuku' => 'required|image|file|mimes:png,jpg,jpeg',
            'fileBuku' => 'required|file|mimes:pdf',
        ];

        if($request->slug != $buku->slug)
        {
            $rules['slug'] = 'required|unique:bukus';
        }


        $validateData = $request->validate($rules);
        if ($request->file('coverBuku')) {
            if ($request->oldcoverBuku) {
                Storage::delete($request->oldcoverBuku);
            }
            $validateData['coverBuku'] = $request->file('coverBuku')->store('coverBuku');
        };
        if ($request->file('fileBuku')) {
            if ($request->oldfileBuku) {
                Storage::delete($request->oldfileBuku);
            }
            $validateData['fileBuku'] = $request->file('fileBuku')->store();
        };

        Buku::where('id', $buku->id)->update($validateData);
        return redirect('/dashboard/bukus')->with('success', 'Data Buku Berhasil Di Perbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->coverBuku) {
            Storage::delete($buku->coverBuku);
        }
        if ($buku->fileBuku) {
            Storage::delete($buku->fileBuku);
        }
        Buku::destroy($buku->id);
        return redirect('/dashboard/bukus')->with('success', 'Data Buku Berhasil di Hapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Buku::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function download($file)
    {
        return response()->download(Storage::path($file));
    }

}
