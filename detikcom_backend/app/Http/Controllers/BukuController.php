<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('page.bukus', [
            'title' => 'Buku',
            'bukus' => Buku::with(['user','kategori'])->latest()->paginate(8),
            'kategoris' => Kategori::get()
        ]);
    }

    public function buku(Buku $buku)
    {
        return view('page.buku', [
            'title' => 'Detail Buku',
            'buku' => $buku
        ]);
    }
}
