<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function store(Request $request)
    {
        // Validasi & simpan data alumni di sini
        return redirect()->back()->with('success', 'Data alumni berhasil disimpan.');
    }
}
