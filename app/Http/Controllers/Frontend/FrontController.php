<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;
use App\Models\About\About;
use App\Models\RecentWork\RecentWork;
use App\Models\RecentWorkGalleries\RecentWorkGalleries;
use App\Models\Artikel\Artikel;
use App\Models\Contact\Contact;
class FrontController extends Controller
{
    public function index()
    {  
        $slides = Slider::all();
        $about = About::first();
        $recent = RecentWork::with('galleries')->get();
        
        return view('front.front', compact('slides', 'about', 'recent'));
    }

    public function singleRecentWork($id)
    {
        $recent = RecentWork::with(['galleries' => function($limit) {
            return $limit->limit(2);
        }])->orderBy('id', 'DESC')->get();
        $singleRecentWork = RecentWork::with('galleries')->where('id', $id)->first();
        return view('front.pages.single-recent-work', compact('singleRecentWork', 'recent'));
    }

    public function artikel(Request $request)
    {
        if($request->has('search')) {
            $search = $request->input('search');
            $artikelSearch = Artikel::with('users')->where('deskripsi', 'LIKE', '%'.$search.'%')->orWhere('judul', 'LIKE', '%'.$search.'%')->paginate(10);
            $artikelTerakhirSearch = Artikel::with('users')->orderBy('published_at', 'DESC')->take(3)->get();
            $artikelWithCategories = Artikel::with('kategoris')->get();
            $artikelWithTags = Artikel::with('tags')->get();
            return view('front.pages.artikel', compact('artikelSearch', 'artikelTerakhirSearch', 'artikelWithCategories', 'artikelWithTags'));
        } else {
            $artikel = Artikel::with('users')->paginate(10);
            $artikelTerakhir = Artikel::with('users')->orderBy('published_at', 'DESC')->take(3)->get();
            $artikelWithCategories = Artikel::with('kategoris')->get();
            $artikelWithTags = Artikel::with('tags')->get();
            return view('front.pages.artikel', compact('artikel', 'artikelTerakhir', 'artikelWithCategories', 'artikelWithTags'));
        }
    }

    public function singleArtikel(Request $request, $slug)
    {
        $single = Artikel::with('users')->where('slug', $slug)->first();
        $artikelTerakhir = Artikel::with('users')->orderBy('published_at', 'DESC')->take(3)->get();
        $artikelWithCategories = Artikel::with('kategoris')->where('slug', $slug)->first();
        $artikelWithTags = Artikel::with('tags')->where('slug', $slug)->first();
        return view('front.pages.single-artikel', compact('single', 'artikelTerakhir', 'artikelWithCategories', 'artikelWithTags'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('front.pages.contact', compact('contact'));
    }

    public function about()
    {
        $about = About::first();
        return view('front.pages.about', compact('about'));
    }
}
