<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';
    protected $fillable = [];

    protected $primaryKey = 'review_id';
    public function user(){
        $this->belongsTo('User');
    }
}
