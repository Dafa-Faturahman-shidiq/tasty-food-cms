<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // PENGUNJUNG : HOME
    public function showHome()
    {
        return view('frontend.home');
    }

    // PENGUNJUNG : ABOUT
    public function showAbout()
    {
        return view('frontend.about');
    }

    // PENGUNJUNG : NEWS
    public function showNews()
    {
        return view('frontend.news.index');
    }

    // PENGUNJUNG : GALLERY
    public function showGallery()
    {
        return view('frontend.gallery');
    }

    // PENGUNJUNG : CONTACT
    public function showContact()
    {
        return view('frontend.contact');
    }
}
