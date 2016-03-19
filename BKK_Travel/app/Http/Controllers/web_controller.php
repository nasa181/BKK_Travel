<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\Item;
use App\PhotoGallery;
use App\Restaurant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class web_controller extends Controller
{
    //
    function start_page(){
        $item = DB::table('item')
            ->leftJoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->get();

        return view('welcome',['item'=> $item]);
    }
    function page_travel(){
        return view('travel');
    }
    function res_info($id){
        $res = DB::table('restaurant')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        return view('info_restaurant',['res'=>$res,'item'=>$item,'photo'=>$photo]);
    }
    function attr_info($id){
        $attr = DB::table('attraction')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        return view('info_attraction',['attr'=>$attr,'item'=>$item,'photo'=>$photo]);
    }
    function search(Request $request){
        $search = $request->search;
        $item = DB::table('item')->where('item_id',$search)->first();
        return view('search_page',['item'=> $item]);
    }

}
