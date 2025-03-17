<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();  // Mengambil semua data penyakit
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('admin.penyakit.create');  // Menampilkan form untuk menambah penyakit
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penyakit' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:penyakit,kode', // Mengubah nullable menjadi required
            'deskripsi' => 'nullable|string',
        ]);

        Penyakit::create($validatedData);

        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);  // Mencari data penyakit berdasarkan ID
        return view('admin.penyakit.edit', compact('penyakit'));  // Menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_penyakit' => 'required|string|max:255',  // Validasi nama penyakit
        ]);

        $penyakit = Penyakit::findOrFail($id);  // Mencari data penyakit berdasarkan ID
        $penyakit->update([
            'nama_penyakit' => $request->nama_penyakit,  // Mengupdate nama penyakit
        ]);

        // Redirect setelah data diperbarui
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);  // Mencari data penyakit berdasarkan ID
        $penyakit->delete();  // Menghapus data penyakit

        // Redirect setelah data dihapus
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil dihapus!');
    }
}
