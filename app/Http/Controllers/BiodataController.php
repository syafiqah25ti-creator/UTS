<?php

namespace App\Http\Controllers;

use App\Models\Biodata1192;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index(Request $request)
    {
        $query = Biodata1192::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('profesi', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $biodatas = $query->latest()->paginate(10);
        return view('admin.biodata.index', compact('biodatas'));
    }

    public function create()
    {
        return view('admin.biodata.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'profesi'      => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:Biodata_1192,email',
            'telepon'      => 'required|string|max:50',
            'alamat'       => 'required|string|max:255',
            'ringkasan'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('biodata_fotos', 'public');
            $validated['foto'] = $fotoPath;
        }

        Biodata1192::create($validated);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $biodata = Biodata1192::with(['pendidikans', 'pengalamans'])->findOrFail($id);
        return view('admin.biodata.show', compact('biodata'));
    }

    public function edit(string $id)
    {
        $biodata = Biodata1192::findOrFail($id);
        return view('admin.biodata.edit', compact('biodata'));
    }

    public function update(Request $request, string $id)
    {
        $biodata = Biodata1192::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'profesi'      => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:Biodata_1192,email,' . $id,
            'telepon'      => 'required|string|max:50',
            'alamat'       => 'required|string|max:255',
            'ringkasan'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $fotoPath = $request->file('foto')->store('biodata_fotos', 'public');
            $validated['foto'] = $fotoPath;
        }

        $biodata->update($validated);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $biodata = Biodata1192::findOrFail($id);

        if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil dihapus!');
    }
}
