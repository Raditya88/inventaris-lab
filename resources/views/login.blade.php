<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login Admin - Inventaris</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container">
    <div class="row justify-content-center align-items-center" style="min-height:100vh">
      <div class="col-md-5">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h3 class="card-title mb-3 text-center">Admin Login</h3>

            @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="admin" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
              </div>

              <div class="d-grid gap-2">
                <button class="btn btn-primary">Sign in</button>
              </div>
            </form>

            <hr>
            <p class="text-muted small mb-0 text-center">Username: <strong>admin</strong> &nbsp;|&nbsp; Password: <strong>admin123</strong></p>
          </div>
        </div>
        <p class="text-center text-muted small mt-3">Sistem Inventaris Laboratorium</p>
      </div>
    </div>
  </div>
</body>
</html>
