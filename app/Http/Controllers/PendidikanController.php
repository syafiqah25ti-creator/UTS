<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Biodata1192;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendidikan::with('biodata');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_institusi', 'like', "%{$search}%")
                  ->orWhere('jurusan', 'like', "%{$search}%")
                  ->orWhere('jenjang', 'like', "%{$search}%");
            });
        }

        $pendidikans = $query->latest()->paginate(10);
        return view('admin.pendidikan.index', compact('pendidikans'));
    }

    public function create()
    {
        $biodatas = Biodata1192::all();
        return view('admin.pendidikan.create', compact('biodatas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'biodata_id'     => 'required|exists:Biodata_1192,id',
            'nama_institusi' => 'required|string|max:255',
            'jenjang'        => 'required|string|max:50',
            'jurusan'        => 'required|string|max:255',
            'tahun_masuk'    => 'required|string|max:10',
            'tahun_lulus'    => 'required|string|max:20',
            'deskripsi'      => 'nullable|string',
        ]);

        Pendidikan::create($validated);

        return redirect()->route('pendidikan.index')->with('success', 'Riwayat pendidikan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $biodatas   = Biodata1192::all();
        return view('admin.pendidikan.edit', compact('pendidikan', 'biodatas'));
    }

    public function update(Request $request, string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);

        $validated = $request->validate([
            'biodata_id'     => 'required|exists:Biodata_1192,id',
            'nama_institusi' => 'required|string|max:255',
            'jenjang'        => 'required|string|max:50',
            'jurusan'        => 'required|string|max:255',
            'tahun_masuk'    => 'required|string|max:10',
            'tahun_lulus'    => 'required|string|max:20',
            'deskripsi'      => 'nullable|string',
        ]);

        $pendidikan->update($validated);

        return redirect()->route('pendidikan.index')->with('success', 'Riwayat pendidikan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')->with('success', 'Riwayat pendidikan berhasil dihapus!');
    }
}
