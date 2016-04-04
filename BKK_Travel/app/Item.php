<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'item';
    protected $fillable = [
        'item_id', 'description', 'title', 'tel', 'isApproved',
    ];

}
