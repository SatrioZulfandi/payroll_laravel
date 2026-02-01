<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari input form (jika ada)
        $search = $request->input('search');

        // Buat query dasar
        $query = Position::query();

        // Jika ada kata kunci pencarian, filter data
        if (!empty($search)) {
            $query->where('nama_jabatan', 'like', '%' . $search . '%')
                ->orWhere('gaji_pokok', 'like', '%' . $search . '%');
        }

        // Ambil hasil (bisa pakai paginate jika ingin)
        $p = $query->orderBy('nama_jabatan', 'asc')->get();

        // Kirim data ke view
        return view('backend.position.index', compact('p'));
    }

    public function create()
    {
        return view('backend.position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gaji' => 'nullable|string',
        ]);

        Position::create([
            'nama_jabatan' => $request->nama,
            'gaji_pokok' => $request->gaji,
        ]);

        return redirect()->route('position')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $p = Position::findOrFail($id);
        $p->delete();

        return redirect()->route('position')->with('success', 'Data jabatan berhasil dihapus.');
    }

    public function edit($id)
    {
        $p = Position::findOrFail($id);
        return view('backend.position.edit', compact('p'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gaji' => 'required|string',
        ]);

        $p = Position::findOrFail($id);
        $p->update([
            'nama_jabatan' => $request->nama,
            'gaji_pokok' => $request->gaji,
        ]);

        return redirect()->route('position')->with('success', 'Data jabatan berhasil diperbarui.');
    }
}
