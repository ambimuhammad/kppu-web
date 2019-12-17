<?php

namespace App\Helpers;
use App\Models\Contact\Contact;
use App\Models\Artikel\Artikel;

class Helper {
    public static function get_footer_contact() {
        $contact = Contact::first();
        $act = '';
        $act .= '<li><i class="fa fa-map-marker"></i>'. $contact->alamat .'</li>';
        $act .= '<li><i class="fa fa-envelope-o"></i>'. $contact->email .'</li>';
        $act .= '<li><i class="fa fa-phone"></i>'. $contact->telepon .'</li>'; 
        $act .= '<li><i class="fa fa-print"></i>'. $contact->fax .'</li>'; 
        return $act;
    }

    public static function get_recent_post() {
        $artikel = Artikel::with('users')->orderBy('published_at', 'DESC')->take(3)->get();
        $act = '';
        foreach($artikel as $recentPost) {
            $act .= '<li>';
            $act .= '<img src="'. asset($recentPost->path) .'" class="img-responsive" alt=""/>';
            $act .= '<h5><a href="'. url('artikels', $recentPost->path) .'">'. $recentPost->judul .'</a></h5>';
            $act .= '</li>';
        }
        return $act;
    }
}