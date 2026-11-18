<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Buku | Perpustakaan Digital</title>
    <style>
        :root {
            color-scheme: light;
            font-family: "Segoe UI", Tahoma, sans-serif;
            color: #202b28;
            background: #f2f6f3;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        header { padding: 26px max(22px, calc((100% - 1120px) / 2)); background: #173d32; color: #fff; }
        header p { margin: 0 0 6px; color: #b9d1c5; font-size: 12px; font-weight: 700; }
        h1 { margin: 0; font-size: 25px; font-weight: 650; }
        header .subtitle { margin: 6px 0 0; color: #d3e2da; font-size: 14px; }
        main { width: min(1120px, calc(100% - 40px)); margin: 30px auto 48px; }
        h2 { margin: 0; font-size: 18px; }
        .section-heading { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; margin-bottom: 14px; }
        .section-heading span { color: #63736b; font-size: 13px; }
        .form-panel { margin-bottom: 34px; padding: 22px; border: 1px solid #dce5df; background: #fff; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .field { min-width: 0; }
        label { display: block; margin-bottom: 6px; color: #405149; font-size: 13px; font-weight: 650; }
        input, select { width: 100%; min-height: 42px; padding: 9px 11px; border: 1px solid #cbd8d0; border-radius: 3px; background: #fbfdfb; color: #202b28; font: inherit; font-size: 14px; }
        input:focus, select:focus { border-color: #28775d; outline: 2px solid #cce5d8; }
        .form-actions { display: flex; gap: 10px; margin-top: 18px; }
        .button { display: inline-flex; min-height: 40px; align-items: center; justify-content: center; padding: 9px 15px; border: 0; border-radius: 3px; background: #17684d; color: #fff; cursor: pointer; font: inherit; font-size: 14px; font-weight: 650; text-decoration: none; }
        .button:hover { background: #10583f; }
        .button-secondary { background: #e8efea; color: #31443a; }
        .button-secondary:hover { background: #dce7df; }
        .button-danger { background: #a63e38; }
        .button-danger:hover { background: #8d302b; }
        .table-wrap { overflow-x: auto; border: 1px solid #dce5df; background: #fff; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 12px 14px; border-bottom: 1px solid #e8eee9; font-size: 13px; white-space: nowrap; }
        th { background: #eaf1ec; color: #43564c; font-size: 12px; font-weight: 700; }
        tbody tr:last-child td { border-bottom: 0; }
        .actions { display: flex; gap: 7px; }
        .actions form { margin: 0; }
        .actions .button { min-height: 32px; padding: 6px 10px; font-size: 12px; }
        .empty { padding: 40px 18px; color: #63736b; text-align: center; }
        .notice { margin-bottom: 20px; padding: 12px 14px; border-left: 3px solid #28775d; background: #e6f2e9; color: #24523e; font-size: 14px; }
        .error { display: block; margin-top: 5px; color: #a42e2e; font-size: 12px; }
        @media (max-width: 640px) {
            header { padding: 23px 20px; }
            main { width: calc(100% - 28px); margin-top: 22px; }
            .form-panel { padding: 16px; }
            .form-grid { grid-template-columns: 1fr; gap: 12px; }
            .section-heading { align-items: flex-start; flex-direction: column; }
            .form-actions { flex-wrap: wrap; }
        }
    </style>
</head>
<body>
    <header>
        <p>PERPUSTAKAAN DIGITAL</p>
        <h1>Sistem Manajemen Perpustakaan</h1>
        <p class="subtitle">Pengelolaan katalog dan data buku</p>
    </header>
    <main>
        @if (session('success'))
            <div class="notice" role="status">{{ session('success') }}</div>
        @endif

        <section class="form-panel" aria-labelledby="form-title">
            <div class="section-heading">
                <h2 id="form-title">{{ $bukuEdit ? 'Ubah Data Buku' : 'Tambah Buku' }}</h2>
            </div>
            <form method="POST" action="{{ $bukuEdit ? route('buku.update', $bukuEdit) : route('buku.store') }}">
                @csrf
                @if ($bukuEdit)
                    @method('PUT')
                @endif
                <div class="form-grid">
                    <div class="field">
                        <label for="judul">Judul Buku</label>
                        <input id="judul" name="judul" type="text" value="{{ old('judul', $bukuEdit->judul ?? '') }}" required maxlength="255">
                        @error('judul') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" value="{{ old('isbn', $bukuEdit->isbn ?? '') }}" required maxlength="32">
                        @error('isbn') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input id="tahun_terbit" name="tahun_terbit" type="number" value="{{ old('tahun_terbit', $bukuEdit->tahun_terbit ?? '') }}" min="1000" max="{{ now()->year }}" required>
                        @error('tahun_terbit') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="pengarang">Pengarang</label>
                        <input id="pengarang" name="pengarang" type="text" value="{{ old('pengarang', $bukuEdit->pengarang ?? '') }}" required maxlength="255">
                        @error('pengarang') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="kategori">Kategori Literatur</label>
                        <select id="kategori" name="kategori" required>
                            <option value="">Pilih kategori</option>
                            @foreach (\App\Models\Buku::KATEGORI as $kategori)
                                <option value="{{ $kategori }}" @selected(old('kategori', $bukuEdit->kategori ?? '') === $kategori)>{{ $kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-actions">
                    <button class="button" type="submit">{{ $bukuEdit ? 'Simpan Perubahan' : 'Simpan Buku' }}</button>
                    @if ($bukuEdit)
                        <a class="button button-secondary" href="{{ route('buku.index') }}">Batal</a>
                    @endif
                </div>
            </form>
        </section>

        <section aria-labelledby="catalog-title">
            <div class="section-heading">
                <h2 id="catalog-title">Katalog Buku</h2>
                <span>{{ $buku->count() }} buku terdaftar</span>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>ISBN</th>
                            <th>Tahun Terbit</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buku as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->isbn }}</td>
                                <td>{{ $item->tahun_terbit }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <div class="actions">
                                        <a class="button button-secondary" href="{{ route('buku.edit', $item) }}">Edit</a>
                                        <form method="POST" action="{{ route('buku.destroy', $item) }}" onsubmit="return confirm('Hapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button button-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">Belum ada data buku. Tambahkan buku pertama melalui formulir di atas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>