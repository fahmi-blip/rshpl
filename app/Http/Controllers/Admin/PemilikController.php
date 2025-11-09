<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Validation\Rule;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }
    public function create()
    {   
        $users = User::all();
        return view('admin.pemilik.create',compact('users'));
    }
   public function store(Request $request)
    {
        // 1. Validasi data langsung menggunakan request
        $validateData = $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        // 2. Simpan data ke database menggunakan Model
        Pemilik::create($validateData);
        
        return redirect()->route('admin.pemilik.index')
                    ->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }
    protected function validatePemilik(Request $request, $id = null)
    {
        // Ambil primary key dari model
        $primaryKey = (new Pemilik)->getKeyName(); // 'idpemilik'
        
        // Aturan validasi unik untuk iduser (1 user hanya bisa jadi 1 pemilik)
        $uniqueIdUserRule = Rule::unique('pemilik', 'iduser');
        
        // Aturan validasi unik untuk no_wa
        $uniqueNoWaRule = Rule::unique('pemilik', 'no_wa');

        if ($id) {
            $uniqueIdUserRule->ignore($id, $primaryKey);
            $uniqueNoWaRule->ignore($id, $primaryKey);
        }

        return $request->validate([
            'iduser' => [
                'required',
                'integer',
                'exists:users,iduser', // Pastikan iduser ada di tabel users
                $uniqueIdUserRule
            ],
            'no_wa' => [
                'required',
                'string',
                'min:10',
                'max:20',
                $uniqueNoWaRule
            ],
            'alamat' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
        ], [
            'iduser.required' => 'User pemilik wajib dipilih.',
            'iduser.exists' => 'User yang dipilih tidak valid.',
            'iduser.unique' => 'User ini sudah terdaftar sebagai pemilik.',
            'no_wa.required' => 'Nomor WA wajib diisi.',
            'no_wa.min' => 'Nomor WA minimal 10 karakter.',
            'no_wa.unique' => 'Nomor WA ini sudah terdaftar.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
        ]);
    }

    /**
     * Helper untuk membuat data baru
     */
    protected function createPemilik(array $data)
    {
        try {
            // Sesuaikan dengan field fillable di model Pemilik
            return Pemilik::create([
                'iduser' => $data['iduser'],
                'no_wa' => trim($data['no_wa']),
                'alamat' => $this->formatAlamat($data['alamat']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data pemilik: ' . $e->getMessage());
        }
    }

    /**
     * Helper untuk format alamat
     */
    protected function formatAlamat($alamat)
    {
        // Contoh format sederhana: trim spasi dan kapitalisasi huruf pertama
        return trim(ucfirst(strtolower($alamat)));
    }
}
