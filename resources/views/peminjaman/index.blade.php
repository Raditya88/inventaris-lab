<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
<div class="container">

    <h2 class="mb-4">Data Peminjaman Alat</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM/NIP</th>
                <th>Kontak</th>
                <th>Alat</th>
                <th>Pinjam</th>
                <th>Kembali</th>
                <th>Status</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nama_peminjam }}</td>
                <td>{{ $d->identitas }}</td>
                <td>{{ $d->kontak }}</td>
                <td>{{ $d->inventaris->nama_alat }}</td>
                <td>{{ $d->tanggal_pinjam }}</td>
                <td>{{ $d->tanggal_kembali }}</td>

                <td>
                    @if($d->status == 'menunggu')
                        <span class="badge bg-warning">Menunggu</span>
                    @elseif($d->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>

                <td>
                    @if($d->status == 'menunggu')
                        <a href="{{ route('peminjaman.approve', $d->id) }}" class="btn btn-success btn-sm">Setujui</a>
                        <a href="{{ route('peminjaman.reject', $d->id) }}" class="btn btn-danger btn-sm">Tolak</a>
                    @else
                        <span class="text-muted">Tidak ada aksi</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
