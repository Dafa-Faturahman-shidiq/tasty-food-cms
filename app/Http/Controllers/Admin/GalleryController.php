<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => 'storage/'. $path,
            'is_featured' => $request->boolean('is_featured')
        ]);

        return redirect()->route('admin.galleries.index')->with('succes', 'Foto Galleri Baerhasil diTambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if (hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $gallery->image = 'storage/'. $path;
        }

        Gallery::create([
            'title' => $request->title,
            'image' => 'storage' . $path,
            'is_featured' => $request->boolean('is_featured')
        ]);

        return redirect()->route('admin.galleries.index')->with('succes', 'Foto Galeri Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete(str_replace('storage/', '', $news->image));
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('succes', 'Foto Galeri Berhasil Hapus');
    }
}
