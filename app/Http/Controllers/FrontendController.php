<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_blogs=Blog::latest()->take(3)->get();
        $categories = Category::all();
        return view('frontend.index.index', compact('feature_blogs','categories'));
    }
}
