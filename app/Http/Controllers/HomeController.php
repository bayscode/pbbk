<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $product = Product::with('ctgr')->limit(4)->inRandomOrder()->get();
        // ->orderBy('name','asc or desc')
        return view('home', compact('slider', 'product'));
    }
}
