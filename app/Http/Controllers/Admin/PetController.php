<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

use Exception; 
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with('user','pemilik', 'rasHewan')->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();
        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validatePet($request);

            $this->createPet($validatedData);

            return redirect()->route('admin.pet.index')
                ->with('success', 'Data Pet berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    protected function validatePet(Request $request, $id = null)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras' => 'required|exists:ras_hewan,idras',
        ];

        $messages = [
            'nama.required' => 'Nama pet wajib diisi.',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
            'idras.required' => 'Ras hewan wajib dipilih.',
        ];

        return $request->validate($rules, $messages);
    }

    protected function createPet(array $data){
        try {
            return Pet::create([
                'nama' => $data['nama'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'warna_tanda' => $data['warna_tanda'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'idpemilik' => $data['idpemilik'],
                'idras' => $data['idras'],
                'iduser' => Auth::id(),
            ]);
        } catch (Exception $e) {
            throw new Exception('Gagal menyimpan data pet: ' . $e->getMessage());
        }
    }
}