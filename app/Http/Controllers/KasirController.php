<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('kasir', compact('user'));
    }
}
