<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;
use Illuminate\Validation\ValidationException;


class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }
    public function create()
    {
        return view('admin.jenis-hewan.create');
    }
   public function store(Request $request)
    {
        // 1. Validasi data langsung menggunakan request
        $validateData = $request->validate([
            'nama_jenis_hewan' => 'required|string|max:255',
        ]);

        // 2. Simpan data ke database menggunakan Model
        JenisHewan::create($validateData);
        
        return redirect()->route('admin.jenis-hewan.index')
                    ->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }
}
