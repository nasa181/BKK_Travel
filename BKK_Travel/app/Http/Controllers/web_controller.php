<?php

namespace App\Http\Controllers;

use App\Item;
use App\PhotoGallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class web_controller extends Controller
{
    //
    function start_page(){
        $item = DB::table('item')
            ->leftJoin('photo_gallery','item.item_id','=','photo_gallery.item_photo_id')
            ->get();

        return view('welcome',['item'=> $item]);
    }
    function page_travel(){
        return view('travel');
    }

}
