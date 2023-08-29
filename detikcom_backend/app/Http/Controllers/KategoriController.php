<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kategori $kategori)
    {
        return view('page.kategori',[
            'title' => 'Kategori Buku',
            'bukus' => $kategori->buku,
            'namaKategori' => $kategori,
            'kategoris' => Kategori::with(['user', 'buku'])
        ]);
    }


}
