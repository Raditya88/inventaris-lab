<!DOCTYPE html>
<html>
<head>
    <title>Data Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-3">Data Inventaris Laboratorium</h2>

        <a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Kode</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_alat }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
