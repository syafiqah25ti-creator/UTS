<?php

namespace App\Http\Controllers;

use App\Models\Biodata1192;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function show($id = null)
    {
        if ($id) {
            $biodata = Biodata1192::with(['pendidikans', 'pengalamans'])->findOrFail($id);
        } else {
            $biodata = Biodata1192::with(['pendidikans', 'pengalamans'])->first();
        }

        // List all biodata for switcher dropdown if multiple
        $allBiodata = Biodata1192::select('id', 'nama_lengkap', 'profesi')->get();

        return view('cv.index', compact('biodata', 'allBiodata'));
    }
}
