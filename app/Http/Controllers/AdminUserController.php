<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class AdminUserController extends Controller {
    public function index() {
        $users = User::where('role', 'user')->get();
        return view('pengguna.index', compact('users'));
    }

    public function create() {
        return view('pengguna.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user',
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function destroy(User $pengguna) {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }


    public function show(User $pengguna) {
        return view('pengguna.show', compact('pengguna'));
    }

    public function edit(User $pengguna) {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, User $pengguna) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $pengguna->id,
        ]);

        $pengguna->update($validated);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui');
    }
}
