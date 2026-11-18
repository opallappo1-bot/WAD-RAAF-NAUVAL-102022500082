<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('id')->get();
        $bukuEdit = null;

        return view('buku.index', compact('buku', 'bukuEdit'));
    }

    public function store(Request $request)
    {
        Buku::create($this->validatedData($request));

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        $bukuEdit = $buku;
        $buku = Buku::orderBy('id')->get();

        return view('buku.index', compact('buku', 'bukuEdit'));
    }

    public function update(Request $request, Buku $buku)
    {
        $buku->update($this->validatedData($request));

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:32'],
            'tahun_terbit' => ['required', 'integer', 'min:1000', 'max:'.now()->year],
            'pengarang' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', Rule::in(Buku::KATEGORI)],
        ]);
    }
}