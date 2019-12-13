<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;
use App\Models\About\About;
class FrontController extends Controller
{
    public function index()
    {  
        $slides = Slider::all();
        $about = About::first();
        return view('front.front', compact('slides', 'about'));
    }
}
