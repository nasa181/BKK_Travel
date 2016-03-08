<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    //
    protected $table = 'photo_gallery';
    protected $fillable = [
        'photo_id', 'photo_url',
    ];

}
