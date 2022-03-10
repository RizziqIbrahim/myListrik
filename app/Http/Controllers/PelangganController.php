<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;

class PelangganController extends Controller
{
    //tampilan dashboard pelanggan
    public function dashboard(Request $request)
    {
        return view('pelanggan.dashboard');
    }
}
