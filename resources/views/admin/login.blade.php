<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    {{-- FORM LOGIN --}}
    <form method="POST" action="{{ route('admin.login.post') }}"
          class="bg-white p-6 rounded-xl shadow w-80 space-y-4 z-10">

        @csrf

        <h2 class="text-xl font-bold text-center">Login Admin</h2>

        <div>
            <label class="text-sm">Email</label>
            <input type="email" name="email"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <label class="text-sm">Password</label>
            <input type="password" name="password"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <button type="submit"
                class="w-full bg-black text-white py-2 rounded">
            Login
        </button>
    </form>


    {{-- ✅ MODAL SUKSES --}}
    @if (session('login_success'))
    <div class="modal fade show" id="successModal" tabindex="-1"
        style="display:block; background: rgba(0,0,0,.4);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 rounded-4">

                <div class="mb-3">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none"
                        stroke="#00CB75" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M8 12l3 3 5-5"/>
                    </svg>
                </div>

                <h4 class="fw-bold mb-2">Success!</h4>
                <p class="text-muted">
                    {{ session('login_success') }}
                </p>

            </div>
        </div>
    </div>

    @endif

    @if (session('login_error') || $errors->any())
    <div class="modal fade show" id="errorModal" tabindex="-1"
        style="display:block; background: rgba(0,0,0,.4);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 rounded-4">

                <div class="mb-3 text-danger fs-1">✖</div>

                <h5 class="fw-bold text-danger">Login Gagal</h5>
                <p class="text-muted">
                    {{ session('login_error') ?? 'Email dan password wajib diisi.' }}
                </p>

                <button class="btn btn-secondary mt-3"
                        onclick="document.getElementById('errorModal').remove()">
                    Tutup
                </button>

            </div>
        </div>
    </div>
    @endif

    @if (session('logout_success'))
    <div class="modal fade show" id="logoutModal" tabindex="-1"
        style="display:block; background: rgba(0,0,0,.4);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 rounded-4">

                <div class="mb-3 text-primary fs-1">ℹ️</div>

                <h5 class="fw-bold">Logout Berhasil</h5>
                <p class="text-muted">
                    {{ session('logout_success') }}
                </p>

                <button class="btn btn-primary mt-3"
                        onclick="window.location.href='{{ route('admin.login') }}'">
                    OK
                </button>

            </div>
        </div>
    </div>
    @endif

</body>
</html>
