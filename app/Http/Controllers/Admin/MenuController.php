<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(8);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $isFeatured = $request->boolean('is_featured');

        if ($isFeatured && Menu::where('is_featured', true)->count() >= 4) {    
            return back()->withInput()->withErrors([    
                'is_featured' => 'Menu utama sudah penuh (maksimal 4). Nonaktifkan salah satu menu utama terlebih dahulu.'
            ]); 
        }   

        $path = $request->file('image')->store('menus', 'public');

        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'storage/' . $path,
            'is_featured' => $request->boolean('is_featured')
        ]);

        return redirect()->route('admin.menus.index')->with('succes', 'Menu Berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $isFeatured = $request->boolean('is_featured');

        if ($isFeatured && Menu::where('is_featured', true)->where('id', '!=', $menu->id)->count() >= 4) {
            return back()->withInput()->withErrors([
                'is_featured' => 'Menu utama sudah penuh (maksimal 4). Nonaktifkan salah satu menu utama terlebih dahulu.'
            ]);
        }

        $imagePath = $menu->image;

        if ($request->hasFile('image')) {
            if (str_starts_with($menu->image, 'storage/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $menu->image));
            }
            $imagePath = 'storage/' . $request->file('image')->store('menus', 'public');
        }

        Menu::update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'is_featured' => $request->boolean('is_featured')
        ]);

        return redirect()->route('admin.menus.index')->with('success', 'Menu Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if (str_starts_with($menu->image, 'storage/')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $menu->image));
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus!');
    }
}
