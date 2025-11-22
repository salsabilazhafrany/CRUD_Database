<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaketController extends Controller
{
    public function index()
    {
        $data = Paket::latest()->get();
        return view('paket.index', compact('data'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi'  => 'required|string',
            'harga'      => 'required|numeric',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoName = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotos'), $fotoName);
        }

        Paket::create([
            'nama_paket' => $request->nama_paket,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'foto'       => $fotoName,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = Paket::findOrFail($id);
        return view('paket.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Paket::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required|string',
            'deskripsi'  => 'required|string',
            'harga'      => 'required|numeric',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoName = $item->foto;

        if ($request->hasFile('foto')) {

            if ($item->foto && File::exists(public_path('fotos/' . $item->foto))) {
                File::delete(public_path('fotos/' . $item->foto));
            }

            $file = $request->file('foto');
            $fotoName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotos'), $fotoName);
        }

        $item->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'foto'       => $fotoName,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = Paket::findOrFail($id);

        if ($item->foto && File::exists(public_path('fotos/' . $item->foto))) {
            File::delete(public_path('fotos/' . $item->foto));
        }

        $item->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }
}
