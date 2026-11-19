<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'about_text',
        'vision',
        'mission',
        'email',
        'phone',
        'address',
        'maps_url',
        'facebook_url',
        'twitter_url',
    ];
}