<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\Event;
use App\Item;
use App\Location;
use App\PhotoGallery;
use App\Restaurant;
use App\Review;
use App\User;
use Faker\Provider\Image;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use  \Illuminate\Session\Middleware\StartSession;
class web_controller extends Controller
{

<<<<<<< HEAD
    public function start_page(){
=======
    function start_page(){

>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
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
        $count_review = DB::table('review')->count();
        $count_review = $count_review - 6;
        $review = DB::table('review')
            ->skip($count_review)
            ->take(6)
            ->get();
        $user = array();
        for($i=0;$i<sizeof($review);$i++){
            $Auser = DB::table('users')->where('user_id',$review[$i]->link_user_id)->first();
            array_push($user,$Auser);
        };
        return view('welcome',['restaurant'=> $restaurant,'attraction' => $attraction,'event'=> $event,'review'=>$review,'user'=>$user]);
    }

    function auto_redirect($id){
        $isAttracionReview = DB::table('item')->where('item_id',$id)->join('attraction','item.item_id','=','attraction.link_item_id')->count();
        if($isAttracionReview) return redirect('/page_travel/info/' . $id);
        else return redirect('/page_restaurant/info/' . $id);
    }


//====================================== list of item ==============================================
    function page_travel($page){
        $num_of_item = DB::table('attraction')->count();
        $num_of_page  = intval($num_of_item/20) +1;
        if($page < 1)$page = 1;
        if($page > $num_of_page) $page = $num_of_page;
        $attraction = DB::table('attraction')
            ->join('item','attraction.link_item_id','=','item.item_id')
            ->leftjoin('location','item.item_id','=','location.location_id')
            ->leftjoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->skip(20*($page-1))
            ->take(20)
            ->get();
        return view('attraction',['attraction'=>$attraction,'page'=>$page,'last_page'=>$num_of_page]);
    }
    function page_restaurant($page){
        $num_of_item = DB::table('restaurant')->count();
        $num_of_page  = intval($num_of_item/20) +1;
        if($page < 1)$page = 1;
        if($page > $num_of_page) $page = $num_of_page;
        $restaurant = DB::table('restaurant')
            ->join('item','restaurant.link_item_id','=','item.item_id')
            ->leftjoin('location','item.item_id','=','location.location_id')
            ->leftjoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->skip(20*($page-1))
            ->take(20)
            ->get();
        return view('restaurant',['restaurant'=>$restaurant,'page'=>$page,'last_page'=>$num_of_page]);
    }


//================================================ information =========================================================
    function res_info($id){
        $res = DB::table('restaurant')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        $user = array();
        foreach($review as $rev){
            $Auser = DB::table('users')->where('user_id',$rev->link_user_id)->first();
            array_push($user,$Auser);
        }
        return view('info_restaurant',['res'=>$res,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location,'user'=>$user]);
    }
    function attr_info($id){
        $attr = DB::table('attraction')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        $user = array();
        foreach($review as $rev){
            $Auser = DB::table('users')->where('user_id',$rev->link_user_id)->first();
            array_push($user,$Auser);
        }
        return view('info_attr',['attr'=>$attr,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location,'user'=>$user]);
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



//====================================================== user ==========================================================
    function register_page(){
<<<<<<< HEAD

        $cannot = Session::get('not_success');

        $user = Auth::user();
        if (Auth::check()) {
            $user = Auth::user();
            return redirect('/',['user'=>$user]);
        }
        else{
            return view('registor',['user'=>$user,'cannot'=>$cannot]);
        }

=======
            return view('registor');
>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
    }
    function register(Request $request){
        $email = $request->in_new_email;
        $password = $request->in_new_password;
<<<<<<< HEAD
//        if($pass != $confirm_pass) return redirect('createNewUser');
        if(Auth::attempt(array('email' => $email, 'password' => $password))) return view('registor',['cannot'=>true]);
=======
        $password2 = $request->in_new_repassword;
        if($password!=$password2) return "The password must consistency.";
        if(DB::table('users')->where('email',$email)->count() >=1){
            return "This email is already exit.";
        }
        $last_id = 0;
        if ( ($count = DB::table('users')->count()) != 0 ){
            $last_id =  DB::table('users')->skip($count -1)->first()->user_id;
        }
>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
        $user = new User();
        $user->user_id = $last_id+1;
        $user->email = $email;
<<<<<<< HEAD
        $user->password = bcrypt($password);
=======
        $user->password = sha1($password);
>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
        $user->Fname = $request->in_Fname;
        $user->Lname = $request->in_Lname;
        $user->birthday = $request->in_birthday;
        $user->gender = $request->sex;
        $user->nationality = $request->country;
        $user->type = $request->in_type;
        $user->save();
<<<<<<< HEAD
        return Redirect::back('/');
=======
        Session::put('user',[$user->email,$user->Fname,$user->Lname,$user->gender,$user->type,$user->user_id]);
        return redirect('/');
    }
    function logout(){
        Session::put('user',null);
        return Redirect::to('/');
>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
    }
    function login(Request $request){
        $email = $request->in_email;
        $password = $request->in_password;
        $password = sha1($password);
        $num  = DB::table('users')->where('email',$email)->where('password',$password)->count();
        if ($num>=1){
            $user = DB::table('users')->where('email',$email)->where('password',$password)->first();
            $arr=[$user->email,$user->Fname,$user->Lname,$user->gender,$user->type,$user->user_id];
            Session::put('user',$arr);
            return Redirect::back();
        }
        else{
            return "Wrong Email or Password.";
        }
<<<<<<< HEAD
        return Redirect::back();
=======
>>>>>>> dcef9e8d67b257e193ff2d2f625f8d6e660d9fb4
    }
    function viewProfile(){
        if (Auth::check()) {
            $user = Auth::user();
            return view('profile',['user'=>$user]);
        }
        else{
            return redirect();
        }
    }
    /*function createReview($id){
        if (Auth::check()) {
            $user = Auth::user();
            return view('review',['id'=>$id,'user'=>$user]);
        }
        else{
            return redirect();
        }
    }*/
    function createReview($item_id){
        $title = DB::table('item')->where('item_id',$item_id)->first()->title;
        $last_id = 0;
        if ( ($count = DB::table('review')->count()) != 0 ){
            $last_id =  DB::table('review')->skip($count -1)->first()->review_id;
        }
        return view('review',['item_id'=>$item_id,'title'=>$title,'review_id'=>$last_id+1]);
    }
    function postReviewTravel(Request $request){
        $review = new Review();
        $photo = new PhotoGallery();
        //-----------------------upload image-----------------------//
        $file = Input::file('profile_picture');
        if($file !=null) {
            $destinationPath = 'img/';
            $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            Input::file('profile_picture')->move($destinationPath, $filename);
            $photo->link_item_id = $request->hidden_value;
            $photo->photo_url = '/' . $destinationPath . $filename;
            $review->title_picture = '/' . $destinationPath . $filename;
            $photo->save();
        }
        //----------------------------------------------------------//
        $last_id = 0;
        if ( ($count = DB::table('review')->count()) != 0 ){
            $last_id =  DB::table('review')->skip($count -1)->first()->review_id;
        }
        $review->review_id = $last_id+1;
        $review->title = $request->title;
        $review->content = $request->description;
        $review->link_item_id = $request->hidden_value;
        $review->link_user_id = $request->user_id;
        $review->save();
        $photo->save();
        $isAttracionReview = DB::table('item')->where('item_id',$request->hidden_value)->join('attraction','item.item_id','=','attraction.link_item_id')->count();
        if($isAttracionReview==1) return redirect('/page_travel/info/'.$request->hidden_value);  
        else return redirect('/page_restaurant/info/'. $request->hidden_value);
    }
    function remove_review(Request $request){
        DB::table('review')
            ->where('review_id',$request->review_id)
            ->delete();
        //echo $test;
        return back();
    }



//======================================    adding new item   ====================================================
    function addAttraction(Request $request){
        //if (Auth::check()) {
         if (true){
            $user = Auth::user();
        }
        else{
            return redirect();
        }
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $attraction = new Attraction();
        $location = new Location();
        $photo = new PhotoGallery()

        ;
        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $item->save();
        /*---------------------upload_picture-----------------------*/
        $file = Input::file('profile_picture');
        if($file !=null) {
            $destinationPath = 'img/';
            $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            Input::file('profile_picture')->move($destinationPath, $filename);
            $num_photo = (DB::table('photo_gallery')->count());
//            $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo-1)->first()->photo_id ) +1;
            $photo->link_item_id = $id_tmp;
            $photo->photo_url = '/' . $destinationPath . $filename;
            $item->title_picture = $photo->photo_url;
            $photo->save();
        }
        /*---------------------------------------------------------*/

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
        $location->postal_code = $request->in_new_post_code;
        $location->lat = $request->in_new_lat;
        $location->long = $request->in_new_lng;
        $location->link_item_id = $id_tmp;


        $location->save();
        $attraction->save();
        return redirect('/page_travel/info/' . $id_tmp);

    }
    function addRestaurant(Request $request){
        //if (Auth::check()) {
        if(true){
            $user = Auth::user();
        }
        else{
            return redirect();
        }
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $restaurant = new Restaurant();
        $location = new Location();
        $photo = new PhotoGallery();

        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $item->save();
        
        /*---------------------upload_picture-----------------------*/
        $file = Input::file('profile_picture');
        if($file !=null) {
            $destinationPath = 'img/';
            $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            Input::file('profile_picture')->move($destinationPath, $filename);
            $num_photo = (DB::table('photo_gallery')->count());
            $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo-1)->first()->photo_id ) +1;
            $photo->link_item_id = $id_tmp;
            $photo->photo_url = '/' . $destinationPath . $filename;
            $item->title_picture = $photo->photo_url;
            $photo->save();
        }
        /*---------------------------------------------------------*/


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
        $location->postal_code = $request->in_new_post_code;
        $location->lat = $request->in_new_lat;
        $location->long = $request->in_new_lng;
        $location->link_item_id = $id_tmp;


        $location->save();
        $restaurant->save();
        return redirect('/page_restaurant/info/' . $id_tmp);
    }
    function addEvent(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
        }
        else{
            return redirect();
        }
        $id_tmp = (DB::table('item')->count())+1;
        $item = new Item();
        $event = new Event();
        $location = new Location();
        $photo = new PhotoGallery();

        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $item->save();

        /*---------------------upload_picture----------------------*/
        $extension = Input::file('profile_picture')->getClientOriginalExtension(); // getting image extension
        $fileName = time().'.'.$extension; // renameing image
        $path = $request->file('profile_picture')->move('img/',$fileName);// move input file to "public/img/<file_name>"
        $path = '/'.$path; // for adding '/' in front of the file path(for searching to the root of file)
        $photo->link_item_id = $id_tmp;
        $photo->photo_url = $path;
        /*---------------------------------------------------------*/


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


        $location->save();
        $event->save();
        $photo->save();
        return redirect('/',['user'=>$user]);

    }



//======================================   go to adding new item page   ==============================================
    function createNewAttraction(){
        //if (Auth::check()) {
        if(true){
            $user = Auth::user();
            return view('add_new_attraction',['user'=>$user]);
        }
        else{
            return redirect();
        }
    }
    function createNewRestaurant(){
        //if (Auth::check()) {
        if(true){
            $user = Auth::user();
            return view('add_new_restaurant',['user'=>$user]);
        }
        else{
            return redirect();
        }
    }
    function createNewEvent(){
        if (Auth::check()) {
            $user = Auth::user();
            return view('add_new_event',['user'=>$user]);
        }
        else{
            return redirect();
        }
    }

}
