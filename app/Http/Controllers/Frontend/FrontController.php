<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;
class FrontController extends Controller
{
    public function index()
    {  
        $slides = Slider::all();
        return view('front.front', compact('slides'));
    }
}
