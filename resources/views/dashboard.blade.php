<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Dashboard Admin</h2>
      <div>
        <a href="{{ url('/logout') }}" class="btn btn-sm btn-outline-danger">Logout</a>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Alat</h6>
            <h3>{{ $totalAlat }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Peminjaman</h6>
            <h3>{{ $totalPeminjaman }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-body">
            <h6 class="text-muted">Menunggu</h6>
            <h3>{{ $menunggu }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-body">
            <h6 class="text-muted">Disetujui</h6>
            <h3>{{ $disetujui }}</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <a href="{{ route('peminjaman.index') }}" class="btn btn-primary me-2">Kelola Peminjaman</a>
      <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Kelola Inventaris</a>
      <a href="{{ route('reports.index') }}" class="btn btn-info text-white ms-2">Laporan</a>
    </div>
  </div>
</body>
</html>
