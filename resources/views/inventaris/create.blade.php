<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-3">Tambah Data Inventaris</h2>

        <form action="{{ route('inventaris.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Alat</label>
                <input type="text" name="nama_alat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kode Alat</label>
                <input type="text" name="kode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>
