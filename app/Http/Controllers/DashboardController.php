<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $bestSellers = Product::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->having('reviews_avg_rating', '>=', 4)   // Rating rata‑rata minimal 4.5
            ->orderByDesc('reviews_avg_rating')
            ->orderByDesc('reviews_count')
            ->take(6)
            ->get();

        $allProducts = Product::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->get();

        return view('dashboard', compact('bestSellers', 'allProducts'));
    }
}

