<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout Success</title>

    <!-- Bootstrap hanya untuk halaman ini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Auto redirect ke login admin -->
    <meta http-equiv="refresh" content="1.5;url={{ route('login') }}">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="modal show d-block" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 rounded-4 shadow">

                <div class="mb-3 text-primary fs-1">ℹ️</div>

                <h4 class="fw-bold mb-2">Logout Berhasil</h4>
                <p class="text-muted mb-0">
                    Anda telah keluar dari sistem.
                </p>

            </div>
        </div>
    </div>

</body>
</html>
