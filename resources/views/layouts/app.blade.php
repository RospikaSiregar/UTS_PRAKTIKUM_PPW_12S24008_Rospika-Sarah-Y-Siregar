<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEL-LEATS - Asset Tracking System</title>
    <style>
       
    </style>
</head>
<body>
    <header>
        <h1>DEL-LEATS</h1>
        <nav>
            <a href="{{ route('equipments.index') }}">Katalog Aset</a>
            <a href="{{ route('equipments.create') }}">Tambah Aset</a>
            <a href="{{ route('loans.create') }}">Riwayat / Peminjaman</a>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        &copy; 2026 Institut Teknologi Del - DEL Lab Equipment & Asset Tracking System
    </footer>
</body>
</html>
