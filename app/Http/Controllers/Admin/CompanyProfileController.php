<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        // Ambil data pertama, atau buat baris kosong jika tabel masih kosong
        $profile = CompanyProfile::firstOrCreate([]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'about_text'   => 'nullable|string',
            'vision'       => 'nullable|string',
            'mission'      => 'nullable|string',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'nullable|string|max:50',
            'address'      => 'nullable|string',
            'maps_url'     => 'nullable|string',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url'  => 'nullable|url|max:255',
        ]);

        $profile = CompanyProfile::firstOrCreate([]);
        $profile->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}