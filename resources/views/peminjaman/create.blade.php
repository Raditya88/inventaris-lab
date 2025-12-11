<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
<div class="container">

    <h2 class="mb-4">Form Peminjaman Alat</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIM / NIP</label>
            <input type="text" name="identitas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kontak (WA/Email)</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pilih Alat</label>
            <select name="inventaris_id" class="form-control" required>
                <option value="">-- pilih alat --</option>
                @foreach ($alat as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_alat }} ({{ $a->kode }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>

        <button class="btn btn-primary">Ajukan Peminjaman</button>
        <a href="/inventaris" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</body>
</html>
