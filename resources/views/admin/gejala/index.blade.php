@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Gejala</h1>

    <!-- Form tambah gejala -->
    <form action="{{ route('admin.gejala.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Gejala</button>
    </form>

    <!-- Daftar gejala -->
    <h2>Daftar Gejala</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Gejala</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gejala as $gejala)
            <tr>
                <td>{{ $gejala->id }}</td>
                <td>{{ $gejala->nama_gejala }}</td>
                <td>
                    <form action="{{ route('admin.gejala.destroy', $gejala->id) }}" method="POST">
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
