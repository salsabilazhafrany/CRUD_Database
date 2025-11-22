<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CrudController extends Controller
{
    // Tampilkan semua paket
    public function index()
    {
        $data = Paket::latest()->paginate(10);
        return view('crud.index', compact('data'));
    }

    // Halaman tambah
    public function create()
    {
        return view('crud.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotos'), $namaFoto);
        }

        // Simpan ke database
        Paket::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'foto'      => $namaFoto
        ]);

        return redirect()->route('crud.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    // Halaman edit
    public function edit($id)
    {
        $item = Paket::findOrFail($id);
        return view('crud.edit', compact('item'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $item = Paket::findOrFail($id);
        $namaFoto = $item->foto;

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($namaFoto && File::exists(public_path('fotos/' . $namaFoto))) {
                File::delete(public_path('fotos/' . $namaFoto));
            }

            // Upload foto baru
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotos'), $namaFoto);
        }

        // Update database
        $item->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'foto'      => $namaFoto
        ]);

        return redirect()->route('crud.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $item = Paket::findOrFail($id);

        // Hapus foto
        if ($item->foto && File::exists(public_path('fotos/' . $item->foto))) {
            File::delete(public_path('fotos/' . $item->foto));
        }

        // Hapus data dari DB
        $item->delete();

        return redirect()->route('crud.index')->with('success', 'Paket berhasil dihapus.');
    }
}
