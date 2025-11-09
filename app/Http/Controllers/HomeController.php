<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokoLaundry;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua toko beserta layanan terkait
        $tokos = TokoLaundry::with('layanans')->get();
        return view('home', compact('tokos'));
    }
}
