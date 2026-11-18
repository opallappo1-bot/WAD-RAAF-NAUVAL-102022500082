<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <style>
        :root {
            color-scheme: light;
            font-family: "Segoe UI", sans-serif;
            color: #17211d;
            background: #f3f6f3;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        header { padding: 28px max(24px, calc((100% - 1080px) / 2)); background: #173d32; color: #fff; }
        header p { margin: 0 0 6px; color: #b9d1c5; font-size: 13px; }
        h1 { margin: 0; font-size: 25px; font-weight: 650; }
        main { width: min(1080px, calc(100% - 40px)); margin: 38px auto; }
        .summary { display: flex; align-items: baseline; gap: 10px; margin-bottom: 18px; }
        .summary strong { font-size: 24px; }
        .summary span { color: #64736c; font-size: 14px; }
        .table-wrap { overflow-x: auto; border: 1px solid #dce5df; background: #fff; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 14px 16px; border-bottom: 1px solid #e8eee9; font-size: 14px; white-space: nowrap; }
        th { background: #f7faf7; color: #52635a; font-size: 12px; font-weight: 650; }
        tbody tr:last-child td { border-bottom: 0; }
        .empty { padding: 48px 20px; color: #64736c; text-align: center; }
        footer { margin-top: 20px; color: #78877f; font-size: 12px; }
        @media (max-width: 600px) {
            header { padding: 24px 20px; }
            main { margin-top: 26px; }
        }
    </style>
</head>
<body>
    <header>
        <p>ADMINISTRASI AKADEMIK</p>
        <h1>Data Mahasiswa</h1>
    </header>
    <main>
        <div class="summary">
            <strong>{{ $mahasiswa->count() }}</strong>
            <span>mahasiswa terdaftar</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <footer>Menampilkan data mahasiswa yang tersimpan.</footer>
    </main>
</body>
</html>