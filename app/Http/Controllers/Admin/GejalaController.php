<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala') );
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        Gejala::create([
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update([
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus!');
    }
}
