<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{

    protected $fillable = [
        'title',
        'short_title',
        'home_slide',
        'video_url',
    ];
}