<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'members' => Member::all(),
            'products' => Product::all(),
        ]);
    }
}