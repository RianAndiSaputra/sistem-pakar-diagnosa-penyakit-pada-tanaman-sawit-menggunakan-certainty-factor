@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Rules</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Rules -->
    <form action="{{ route('admin.rules.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="nama_rule" class="form-label">Nama Aturan</label>
            <input type="text" name="nama_rule" class="form-control" placeholder="Masukkan Nama Aturan" required>
        </div>

        <div class="mb-3">
            <label for="gejala_id" class="form-label">Gejala</label>
            <select name="gejala_id" class="form-select" required>
                <option value="" disabled selected>Pilih Gejala</option>
                @foreach ($gejala as $gejala)
                    <option value="{{ $gejala->id }}">{{ $gejala->nama_gejala }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="penyakit_id" class="form-label">Penyakit</label>
            <select name="penyakit_id" class="form-select" required>
                <option value="" disabled selected>Pilih Penyakit</option>
                @foreach ($penyakits as $penyakit)
                    <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                @endforeach
            </select>
        </div>

        <!-- Input Nilai CF -->
        <div class="mb-3">
            <label for="nilai_cf" class="form-label">Nilai CF</label>
            <input type="number" name="nilai_cf" class="form-control" placeholder="Masukkan Nilai CF (0.0 - 1.0)" step="0.01" min="0" max="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <!-- Tabel Rules -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Aturan</th>
                <th>Gejala</th>
                <th>Penyakit</th>
                <th>Nilai CF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rules as $rule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rule->nama_aturan }}</td>
                    <td>{{ $rule->gejala }}</td>
                    <!-- Menampilkan Nama Penyakit berdasarkan Relasi -->
                    <td>{{ $rule->penyakit->nama_penyakit ?? 'Tidak Diketahui' }}</td>
                    <td>{{ $rule->nilai_cf }}</td>
                    <td>
                        {{-- <!-- Tombol Edit -->
                        <a href="{{ route('admin.rules.edit', $rule->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
