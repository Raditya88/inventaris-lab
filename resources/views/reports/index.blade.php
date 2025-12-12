<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">

    <h3 class="mb-3">Laporan Peminjaman</h3>

    <form method="GET" class="row g-2 align-items-end mb-3">
      <div class="col-md-3">
        <label class="form-label">Dari Tanggal</label>
        <input type="date" name="from" value="{{ $from ?? '' }}" class="form-control">
      </div>

      <div class="col-md-3">
        <label class="form-label">Sampai</label>
        <input type="date" name="to" value="{{ $to ?? '' }}" class="form-control">
      </div>

      <div class="col-md-3">
        <label class="form-label">Alat</label>
        <select name="inventaris_id" class="form-control">
          <option value="">-- Semua --</option>
          @foreach($inventaris as $i)
            <option value="{{ $i->id }}" {{ (isset($inventaris_id) && $inventaris_id == $i->id) ? 'selected' : '' }}>
              {{ $i->nama_alat }} ({{ $i->kode }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3">
        <button class="btn btn-primary">Filter</button>

        <a href="{{ route('reports.pdf', request()->query()) }}" class="btn btn-danger ms-2">
          Export PDF
        </a>
      </div>
    </form>


    <table class="table table-bordered table-striped table-sm">
      <thead class="table-light">
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
        @forelse($data as $d)
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
        @empty
          <tr>
            <td colspan="8" class="text-center">Tidak ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>

  </div>
</body>
</html>
