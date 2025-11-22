<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = Paket::all();
        return view('crud.index', compact('data'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFoto = null;

        // Upload Foto
        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $namaFoto);
        }

        Paket::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $namaFoto
        ]);

        return redirect()->route('crud.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $item = Paket::findOrFail($id);
        return view('crud.edit', compact('item'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $item = Paket::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update foto
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($item->foto && file_exists(public_path('fotos/'.$item->foto))) {
                unlink(public_path('fotos/'.$item->foto));
            }

            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $namaFoto);

            $item->foto = $namaFoto;
        }

        $item->nama = $request->nama;
        $item->deskripsi = $request->deskripsi;
        $item->harga = $request->harga;
        $item->save();

        return redirect()->route('crud.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Hapus data
    public function delete($id)
    {
        $item = Paket::findOrFail($id);

        if ($item->foto && file_exists(public_path('fotos/'.$item->foto))) {
            unlink(public_path('fotos/'.$item->foto));
        }

        $item->delete();

        return redirect()->route('crud.index')->with('success', 'Paket berhasil dihapus!');
    }
}
