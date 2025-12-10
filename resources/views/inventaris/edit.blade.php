<!DOCTYPE html>
<html>
<head>
    <title>Edit Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-3">Edit Data Inventaris</h2>

        <form action="{{ route('inventaris.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Alat</label>
                <input type="text" name="nama_alat" value="{{ $item->nama_alat }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kode Alat</label>
                <input type="text" name="kode" value="{{ $item->kode }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ $item->jumlah }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="tersedia" {{ $item->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak tersedia" {{ $item->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>

</body>
</html>
