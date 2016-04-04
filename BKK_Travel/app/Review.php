<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'Review';
    protected $fillable = [];


    public function user(){
        $this->belongsTo('user');
    }
}
