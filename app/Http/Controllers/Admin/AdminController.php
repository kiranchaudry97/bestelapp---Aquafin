<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class AdminController extends Controller
{
    /**
     * Toon het admin dashboard.
     */
    public function dashboard()
    {
        $totalMaterials = Material::count();

        $lowStockMaterials = Material::where('voorraad', '<=', 10)
            ->orderBy('voorraad', 'asc')
            ->take(5)
            ->get();

        $recentMaterials = Material::orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalMaterials',
            'lowStockMaterials',
            'recentMaterials'
        ));
    }
}