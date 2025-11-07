<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

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
        $validateData = $this->validateJenisHewan($request);

        $jenisHewan = $this->createJenisHewan($validateData);
        
        return redirect()->route('admin.jenis-hewan.index')
                    ->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }
}
