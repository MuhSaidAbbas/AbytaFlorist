<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Logout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 text-center">

        <div class="flex justify-center mb-4">
            <div class="h-14 w-14 flex items-center justify-center rounded-full bg-red-100 text-red-600 text-2xl">
                !
            </div>
        </div>

        <h3 class="text-lg font-semibold mb-2 text-red-600">
            Konfirmasi Logout
        </h3>

        <p class="text-sm text-gray-600 mb-6">
            Apakah Anda yakin ingin keluar dari akun?
        </p>

        <div class="flex gap-3">
            <a href="{{ url()->previous() }}"
               class="w-1/2 rounded-lg bg-gray-200 py-2 text-gray-700 hover:bg-gray-300 transition">
                Batal
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-1/2">
                @csrf
                <button
                    class="w-full rounded-lg bg-red-600 py-2 text-white hover:bg-red-700 transition">
                    Ya, Keluar
                </button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
