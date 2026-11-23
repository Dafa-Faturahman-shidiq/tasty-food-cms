<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Menu;

class PengunjungController extends Controller
{
    // PENGUNJUNG : HOME
    public function showHome()
    {

        // Menu
        $menus = Menu::where('is_featured', true)->latest()->take(4)->get();

        //  Berita Spesifik
        $featuredNews = News::where('is_featured', true)
                                ->latest()
                                ->first();

        //  berita lainnya
        $otherNews = News::where('is_featured', false)
                                ->latest()
                                ->take(4)
                                ->get();
        
        // GALERY
        $gallerys = Gallery::latest()
                            ->take(6)
                            ->get();

        return view('frontend.home', compact('featuredNews', 'otherNews', 'gallerys', 'menus'));
    }

    // PENGUNJUNG : ABOUT
    public function showAbout()
    {
        return view('frontend.about');
    }

    // PENGUNJUNG : NEWS
    public function showNews()
    {
        $featuredNews = News::where('is_featured', true)
                                ->latest()
                                ->first();

        $otherNews = News::where('is_featured', false) 
                                ->latest()
                                ->get();

        return view('frontend.news.index', compact('featuredNews', 'otherNews'));
    }

    // PENGUNJUNG : GALLERY
    public function showGallery()
    {
        $featuredGalleries = Gallery::where('is_featured', true)
                                ->latest()
                                ->get();
        
        $gallerys = Gallery::latest()->get();

        return view('frontend.gallery', compact('featuredGalleries', 'gallerys'));
    }

    // PENGUNJUNG : CONTACT
    public function showContact()
    {
        return view('frontend.contact');
    }

    // PENGUNJUNG : DETAIL NEWS
    public function showNewsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('frontend.news.show', compact('news'));
    }

    // CONTACT FORM
    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }
}
