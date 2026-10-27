<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use App\Models\Biodata1192;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengalaman::with('biodata');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('posisi', 'like', "%{$search}%")
                  ->orWhere('perusahaan', 'like', "%{$search}%");
            });
        }

        $pengalamans = $query->latest()->paginate(10);
        return view('admin.pengalaman.index', compact('pengalamans'));
    }

    public function create()
    {
        $biodatas = Biodata1192::all();
        return view('admin.pengalaman.create', compact('biodatas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'biodata_id'    => 'required|exists:Biodata_1192,id',
            'posisi'        => 'required|string|max:255',
            'perusahaan'    => 'required|string|max:255',
            'tahun_mulai'   => 'required|string|max:10',
            'tahun_selesai' => 'required|string|max:20',
            'deskripsi'     => 'nullable|string',
        ]);

        Pengalaman::create($validated);

        return redirect()->route('pengalaman.index')->with('success', 'Pengalaman kerja berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $biodatas   = Biodata1192::all();
        return view('admin.pengalaman.edit', compact('pengalaman', 'biodatas'));
    }

    public function update(Request $request, string $id)
    {
        $pengalaman = Pengalaman::findOrFail($id);

        $validated = $request->validate([
            'biodata_id'    => 'required|exists:Biodata_1192,id',
            'posisi'        => 'required|string|max:255',
            'perusahaan'    => 'required|string|max:255',
            'tahun_mulai'   => 'required|string|max:10',
            'tahun_selesai' => 'required|string|max:20',
            'deskripsi'     => 'nullable|string',
        ]);

        $pengalaman->update($validated);

        return redirect()->route('pengalaman.index')->with('success', 'Pengalaman kerja berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->delete();

        return redirect()->route('pengalaman.index')->with('success', 'Pengalaman kerja berhasil dihapus!');
    }
}
