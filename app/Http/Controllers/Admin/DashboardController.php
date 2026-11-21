<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews      = News::count();
        $totalGalleries = Gallery::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        return view('admin.dashboard', compact('totalNews', 'totalGalleries', 'unreadContacts'));
    }
}