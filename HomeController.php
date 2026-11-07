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
            'members'       => Member::orderBy('id')->get(),
            'products'      => Product::orderBy('id')->get(),
            'companyValues' => CompanyValues::orderBy('id')->get(),
            'blogs'         => OurBlog::orderBy('id')->get(),
            'ourGalleries'  => OurGallery::orderBy('id')->get(),
            'socialMedias'  => SocialMedia::orderBy('id')->get(),
        ]);
    }
}