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
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManager;


class web_controller extends Controller
{
    //
    function register(Request $request){
        $email = $request->in_new_email;
        $password = $request->in_new_password;

//        if($pass != $confirm_pass) return redirect('createNewUser');

        if(Auth::attempt(array('email' => $email))) return redirect();
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->Fname = $request->in_Fname;
        $user->Lname = $request->in_Lname;
        $user->birthday = $request->in_birthday;
        $user->gender = $request->sex;
        $user->nationality = $request->country;
        $user->type = $request->in_type;
        $user->save();
    }
    function login(Request $request){
        $email = $request->in_email;
        $password = $request->in_password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect();
        }
        return redirect()->with('not_success',true);
    }
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
    function page_restaurant($page){
        $num_of_page = (DB::table('item')->count())/25;
        if($page < 0)$page = 0;
        if($page > $num_of_page) $page = $num_of_page;
        $restaurant = DB::table('item')
            ->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('restaurant','item.item_id','=','restaurant.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->skip(25*$page)
            ->take(25)
            ->get();
        return view('restaurant',['restaurant'=>$restaurant,'page'=>$page]);
    }
    function res_info($id){
        $res = DB::table('restaurant')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->take(5)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        return view('info_restaurant',['res'=>$res,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location]);
    }
    function attr_info($id){
        $attr = DB::table('attraction')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->take(5)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        return view('info_attr',['attr'=>$attr,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location]);
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
        if (Auth::check()) {
            $user = Auth::user();
            return redirect(['user'=>$user]);
        }
        else{
            return view('registor');
        }

    }
    function createReview($id){
        if (Auth::check()) {
            return view('review',['id'=>$id]);
        }
        else{
            return redirect();
        }
    }

    function postReviewTravel(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
        }
        else{
            return redirect();
        }
        $file = $request->file('photo');//get input file
        $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
        $fileName = time().'.'.$extension; // renameing image
        $path = $request->file('photo')->move('img/',$fileName);// move input file to "public/img/<file_name>"
        $path = '/'.$path; // for adding '/' in front of the file path(for searching to the root of file)
//=============== get string input =========================
        $title = $request->title;
        $description = $request->description;

//=============== save file to database ====================
        $review = new Review();
        $review->title = $title;
        $review->content = $description;
        $review->title_picture = $path;
        $review->link_item_id = $request->hidden_value;
        $review->link_user_id = $user->user_id;
        $review->save();
        $photo = new PhotoGallery();
        $photo->link_item_id = $request->hidden_value;
        $photo->photo_url = $path;
        $photo->save();
        return redirect('/');
    }
    function viewProfile(){
        if (Auth::check()) {
            $user = Auth::user();
            return view('profile',['user',$user]);
        }
        else{
            return redirect();
        }
    }




//======================================    adding new item   ====================================================
    function addAttraction(Request $request){
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $attraction = new Attraction();
        $location = new Location();
        $photo = new PhotoGallery();
        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $attraction->attraction_type = $request->in_new_type;
        $attraction->activity = $request->in_new_activity;
        $attraction->entrance_fee = $request->in_new_entrancefee;
        $attraction->oc_time = $request->in_new_oc_time;
        $attraction->parking = $request->in_new_parking;
        $attraction->website_url = $request->in_new_web_url;
        $attraction->link_item_id = $id_tmp;
        $location->hint = $request->in_new_hint;
        $location->build = $request->in_new_build;
        $location->street_address = $request->in_new_street_address;
        $location->sub_district = $request->in_new_sub_dis;
        $location->district = $request->in_new_district;
        $location->province = $request->in_new_province;
        $location->post_code = $request->in_new_post_code;
        $location->lat = $request->in_new_lat;
        $location->lng = $request->in_new_lng;
        $location->link_item_id = $id_tmp;
        $item->save();
        $location->save();
        $attraction->save();


    }
    function addRestaurant(Request $request){
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $restaurant = new Restaurant();
        $location = new Location();
        $photo = new PhotoGallery();
        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $restaurant->price_range = $request->in_new_price_range;
        $restaurant->food_type = $request->in_new_food_type;
        $restaurant->oc_time = $request->in_new_oc_time;
        $restaurant->credit_card = $request->in_new_credit_card;
        $restaurant->child_appropriate = $request->in_new_child_appropriate;
        $restaurant->reservable = $request->in_new_reservable;
        $restaurant->parking = $request->in_new_parking;
        $restaurant->link_item_id = $id_tmp;
        $location->hint = $request->in_new_hint;
        $location->build = $request->in_new_build;
        $location->street_address = $request->in_new_street_address;
        $location->sub_district = $request->in_new_sub_dis;
        $location->district = $request->in_new_district;
        $location->province = $request->in_new_province;
        $location->post_code = $request->in_new_post_code;
        $location->lat = $request->in_new_lat;
        $location->lng = $request->in_new_lng;
        $location->link_item_id = $id_tmp;
        $item->save();
        $location->save();
        $restaurant->save():

    }
    function addEvent(Request $request){
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $event = new Event();
        $location = new Location();
        $photo = new PhotoGallery();
        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $event->start_date = $request->in_new_start_date;
        $event->end_date = $request->in_new_end_date;
        $event->entrance_fee = $request->in_new_entrance_fee;
        $event->type = $request->in_new_type;
        $event->parking = $request->in_new_parking;
        $event->website_url = $request->in_new_website_url;
        $event->link_item_id = $id_tmp;
        $location->hint = $request->in_new_hint;
        $location->build = $request->in_new_build;
        $location->street_address = $request->in_new_street_address;
        $location->sub_district = $request->in_new_sub_dis;
        $location->district = $request->in_new_district;
        $location->province = $request->in_new_province;
        $location->post_code = $request->in_new_post_code;
        $location->lat = $request->in_new_lat;
        $location->lng = $request->in_new_lng;
        $location->link_item_id = $id_tmp;
        $item->save();
        $location->save();
        $event->save();

    }




//======================   go to adding new item page   ===================================
    function createNewAttraction(){
        return view('add_new_attraction');
    }
    function createNewRestaurant(){
        return view('add_new_restaurant');
    }
    function createNewEvent(){
        return view('add_new_event');
    }


}
