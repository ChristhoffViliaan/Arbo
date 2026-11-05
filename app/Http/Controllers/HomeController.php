<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\CompanyValues;
use App\Models\OurBlog;
use App\Models\OurGallery;
use App\Models\SocialMedia;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'members'       => Member::all(),
            'products'      => Product::all(),
            'companyValues' => CompanyValues::all(),
            'blogs'         => OurBlog::all(),
            'ourGalleries'  => OurGallery::all(),
            'socialMedias'  => SocialMedia::all(),
        ]);
    }
}