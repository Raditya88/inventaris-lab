<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
        h3 { margin-bottom: 0; }
    </style>
</head>
<body>

    <h3>Laporan Peminjaman</h3>
    <p>
        Periode:
        <strong>{{ $from ?? '-' }}</strong> s/d
        <strong>{{ $to ?? '-' }}</strong>
    </p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Peminjam</th>
                <th>Identitas</th>
                <th>Kontak</th>
                <th>Alat</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_peminjam }}</td>
                    <td>{{ $d->identitas }}</td>
                    <td>{{ $d->kontak }}</td>
                    <td>{{ $d->inventaris->nama_alat }}</td>
                    <td>{{ $d->tanggal_pinjam }}</td>
                    <td>{{ $d->tanggal_kembali }}</td>
                    <td>{{ ucfirst($d->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
