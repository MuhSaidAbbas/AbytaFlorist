<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Success</title>

    <!-- Bootstrap hanya untuk halaman ini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Auto redirect ke dashboard admin -->
    <meta http-equiv="refresh" content="1.5;url={{ route('admin.dashboard') }}">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="modal show d-block" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 rounded-4 shadow">

                <div class="mb-3">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none"
                         stroke="#00CB75" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M8 12l3 3 5-5"/>
                    </svg>
                </div>

                <h4 class="fw-bold mb-2">Success!</h4>
                <p class="text-muted mb-0">
                    Berhasil login sebagai admin.
                </p>

            </div>
        </div>
    </div>

</body>
</html>
