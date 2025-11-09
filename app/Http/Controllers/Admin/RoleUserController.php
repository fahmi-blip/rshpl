<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use Exception; // Tambahkan ini

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUser = RoleUser::with('role', 'user')->get();
        return view('admin.role-user.index', compact('roleUser'));
    }

    // 1. Method untuk menampilkan form create
    public function create()
    {
        $roles = Role::all();
        $users = User::all(); // Ambil user yang belum punya role? Untuk sementara ambil semua.
        return view('admin.role-user.create', compact('roles', 'users'));
    }

    // 2. Method untuk menyimpan data [cite: 1661-1668]
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateRoleUser($request);
            $this->createRoleUser($validatedData);

            return redirect()->route('admin.role-user.index')
                ->with('success', 'Data Role User berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper Validasi [cite: 1683-1701]
    protected function validateRoleUser(Request $request, $id = null)
    {
        // Asumsi 1 user hanya punya 1 role, maka iduser harus unique
        $uniqueRule = $id ? 'unique:role_user,iduser,' . $id . ',idrole_user' : 'unique:role_user,iduser';

        $rules = [
            'iduser' => ['required', 'exists:users,iduser', $uniqueRule],
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|string|max:50',
        ];

        $messages = [
            'iduser.required' => 'User wajib dipilih.',
            'iduser.unique' => 'User ini sudah memiliki role.',
            'idrole.required' => 'Role wajib dipilih.',
        ];

        return $request->validate($rules, $messages);
    }

    // 4. Helper Create Data [cite: 1707-1716]
    protected function createRoleUser(array $data)
    {
        try {
            return RoleUser::create([
                'iduser' => $data['iduser'],
                'idrole' => $data['idrole'],
                'status' => $data['status'],
            ]);
        } catch (Exception $e) {
            throw new Exception('Gagal menyimpan data role user: ' . $e->getMessage());
        }
    }
}