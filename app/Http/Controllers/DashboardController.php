<?php

namespace App\Http\Controllers;

use App\Models\Biodata1192;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBiodata    = Biodata1192::count();
        $totalPendidikan = Pendidikan::count();
        $totalPengalaman = Pengalaman::count();

        $latestBiodatas   = Biodata1192::latest()->take(5)->get();
        $latestPendidikan = Pendidikan::with('biodata')->latest()->take(5)->get();
        $latestPengalaman = Pengalaman::with('biodata')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBiodata',
            'totalPendidikan',
            'totalPengalaman',
            'latestBiodatas',
            'latestPendidikan',
            'latestPengalaman'
        ));
    }
}
