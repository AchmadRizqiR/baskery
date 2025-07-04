<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ambil semua produk
        return view('dashboard', compact('products')); // lempar ke blade
    }
}

