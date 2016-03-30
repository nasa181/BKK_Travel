<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\Event;
use App\Item;
use App\Location;
use App\PhotoGallery;
use App\Restaurant;
use App\Review;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManager;


class web_controller extends Controller
{
    //
    function start_page(){
        $event = DB::table('item')
            ->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('event','item.item_id','=','event.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->take(5)
            ->get();
        $attraction = DB::table('item')
            ->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('attraction','item.item_id','=','attraction.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->take(5)
            ->get();
        $restaurant = DB::table('item')
            ->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('restaurant','item.item_id','=','restaurant.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->take(5)
            ->get();
        return view('welcome',['restaurant'=> $restaurant,'attraction' => $attraction,'event'=> $event]);
    }
    function page_travel($page){
        $num_of_page = (DB::table('item')->count())/25;
        if($page < 0)$page = 0;
        if($page > $num_of_page) $page = $num_of_page;
        $attraction = DB::table('item')
            ->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('attraction','item.item_id','=','attraction.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->skip(25*$page)
            ->take(25)
            ->get();
        return view('attraction',['attraction'=>$attraction,'page'=>$page]);
    }
    function res_info($id){
        $res = DB::table('restaurant')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->take(5)->get();
        return view('info_restaurant',['res'=>$res,'item'=>$item,'photo'=>$photo,'review'=>$review]);
    }
    function attr_info($id){
        $attr = DB::table('attraction')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->take(5)->get();
        return view('info_attr',['attr'=>$attr,'item'=>$item,'photo'=>$photo]);
    }
    function event_info($id){
        $event = DB::table('event')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        return view('info_event',['event'=>$event,'item'=>$item,'photo'=>$photo]);
    }
    function search(Request $request){
        $search = $request->in_search;
        $item = DB::table('item')->where('item_id',$search)->first();
        return view('search_page',['item'=> $item]);
    }
    function register_page(){
        return view('registor');
    }
    function createReview($id){
        return view('Review',['id'=>$id]);
    }
    function postReview(Request $request){

        //$destinationPath = 'uploads'; // upload path
        $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
        $fileName = time().'.'.$extension; // renameing image
        //Input::file('photo')->move($destinationPath, $fileName); // uploading file to given path

        $path = public_path('/' . $fileName);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $title = $request->title;
        $description = $request->description;
        //$file = fopen($request->file('photo')->getRealPath(), "rb");
        //$contents = fread($file, filesize($file));
        //fclose($file);
        //$imgByte = base64_encode($contents);

        $review = new Review();
        $review->title = $title;
        $review->content = $description;
        $review->title_picture = $fileName;
        $review->link_item_id = $request->hidden_value;
        $review->link_user_id = $request->hidden_value;
        $review->save();
        $photo = new PhotoGallery();
        $photo->link_item_id = $request->hidden_value;
        $photo->photo_url = $fileName;
        $photo->save();
        return redirect('/');
    }

}
