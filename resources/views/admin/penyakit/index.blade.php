@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Penyakit</h1>

    <!-- Form tambah penyakit -->
    <form action="{{ route('admin.penyakit.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode Penyakit</label>
            <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan kode penyakit" required>
        </div>
        <div class="form-group">
            <label for="nama_penyakit">Nama Penyakit</label>
            <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" placeholder="Masukkan nama penyakit" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Penyakit</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi penyakit"></textarea>
        </div>
        <div class="form-group">
            <label for="solusi">Solusi</label>
            <textarea name="solusi" id="solusi" class="form-control" rows="3" placeholder="Masukkan solusi untuk penyakit"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Penyakit</button>
    </form>
    

    <!-- Daftar penyakit -->
    <h2>Daftar Penyakit</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>kode</th>
                <th>Nama Penyakit</th>
                <th>Deskripsi</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penyakits as $penyakit)
            <tr>
                <td>{{ $penyakit->id }}</td>
                <td>{{ $penyakit->kode }}</td>
                <td>{{ $penyakit->nama_penyakit }}</td>
                <td>{{ $penyakit->deskripsi }}</td>
                <td>{{ $penyakit->solusi }}</td>
                <td>
                    <form action="{{ route('admin.penyakit.destroy', $penyakit->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     <!-- Tombol Kembali -->
     <div class="mt-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
