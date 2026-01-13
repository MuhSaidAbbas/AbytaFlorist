<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
</head>
<body>

<h1>Register User</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('register.post') }}">
    @csrf

    <div>
        <input type="text" name="name" placeholder="Nama" required>
    </div>

    <div>
        <input type="email" name="email" placeholder="Email" required>
    </div>

    <div>
        <input type="password" name="password" placeholder="Password" required>
    </div>

    <div>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    </div>

    <button type="submit">Daftar</button>
</form>

</body>
</html>
