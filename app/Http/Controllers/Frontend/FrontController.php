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
use App\Models\Service\Service;
use App\Models\Client\Client;
use App\Models\Kategori\Kategori;

class FrontController extends Controller
{
    public function index()
    {  
        $slides = Slider::all();
        $about = About::first();
        $client = Client::all();
        $recent = RecentWork::with('galleries')->get();
        
        return view('front.front', compact('slides', 'about', 'recent', 'client'));
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
            $artikelWithCategories = Kategori::all();
            $artikelWithTags = Artikel::with('tags')->get();
            return view('front.pages.artikel', compact('artikelSearch', 'artikelTerakhirSearch', 'artikelWithCategories', 'artikelWithTags'));
        } else {
            $artikel = Artikel::with('users')->paginate(10);
            $artikelTerakhir = Artikel::with('users')->orderBy('published_at', 'DESC')->take(3)->get();
            $artikelWithCategories = Kategori::all();
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

    public function about(Request $request, $slug)
    {
        $replaceSlug = \Str::replaceArray('-', [' '], $slug);
        $about = About::where('jenis_about', $replaceSlug)->first();
        return view('front.pages.about-companyprofile', compact('about'));
    }

    public function service(Request $request, $slug)
    {
        $replaceSlug = \Str::replaceArray('-', [' '], $slug);
        $service = Service::where('jenis_service', $replaceSlug)->first();
        return view('front.pages.service', compact('service'));
    }

    public function project()
    {  
        $recent = RecentWork::with('galleries')->get();
        
        return view('front.pages.project', compact('recent'));
    }
}
