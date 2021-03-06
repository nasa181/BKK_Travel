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
use App\Rating;
use App\Like;
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

    function start_page(){
        $event = DB::table('item')
            //->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('event','item.item_id','=','event.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->take(5)
            ->get();
        $attraction = DB::table('item')
            //->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->join('attraction','item.item_id','=','attraction.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id')
            ->take(5)
            ->get();
        $restaurant = DB::table('item')
            //->join('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
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
        $likes = Like::join('review','review.review_id','=','like_relation.review_id')
            ->select('review.review_id','likeOrDislike')
            ->get();
        return view('welcome',['restaurant'=> $restaurant,'attraction' => $attraction,'event'=> $event,'review'=>$review,'user'=>$user,'likes'=>$likes]);
    }

    function auto_redirect($id){
        $isAttracionReview = DB::table('item')->where('item_id',$id)->join('attraction','item.item_id','=','attraction.link_item_id')->count();
        $isResReview = DB::table('item')->where('item_id',$id)->join('restaurant','item.item_id','=','restaurant.link_item_id')->count();
        if($isAttracionReview ==1) return redirect('/page_travel/info/' . $id);
        else if($isResReview== 1) return redirect('/page_restaurant/info/' . $id);
        else return redirect('/page_event/info/' . $id);
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
            //->leftjoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
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
            //->leftjoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->skip(20*($page-1))
            ->take(20)
            ->get();
        return view('restaurant',['restaurant'=>$restaurant,'page'=>$page,'last_page'=>$num_of_page]);
    }
    function page_event($page){
        $num_of_item = DB::table('event')->count();
        $num_of_page  = intval($num_of_item/20) +1;
        if($page < 1)$page = 1;
        if($page > $num_of_page) $page = $num_of_page;
        $event = DB::table('event')
            ->join('item','event.link_item_id','=','item.item_id')
            ->leftjoin('location','item.item_id','=','location.location_id')
            //->leftjoin('photo_gallery','item.item_id','=','photo_gallery.link_item_id')
            ->skip(20*($page-1))
            ->take(20)
            ->get();
        return view('event',['event'=>$event,'page'=>$page,'last_page'=>$num_of_page]);
    }

//================================================ information =========================================================
    function event_info($id){
        $event = DB::table('event')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        $ratings = DB::table('rating_relation')->where('item_id',$id)->get();
        $likes = Like::join('review','review.review_id','=','like_relation.review_id')
            ->where('link_item_id',$item->item_id)
            ->select('review.review_id','likeOrDislike')
            ->get();
        /*find avg_rating*/
        $avg_rating = 0.0;
        $i=0;
        foreach($ratings as $rat){
            $i++;
            $avg_rating = $avg_rating + $rat->rating;
        }
        if($i!=0) $avg_rating = $avg_rating/$i;
        $user = array();
        foreach($review as $rev){
            $Auser = DB::table('users')->where('user_id',$rev->link_user_id)->first();
            array_push($user,$Auser);
        }
        return view('info_event',['event'=>$event,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location,
            'user'=>$user,'avg_rating'=>$avg_rating,'rating_count'=>$i,'likes'=>$likes]);
    }
    function res_info($id){
        $res = DB::table('restaurant')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        $ratings = DB::table('rating_relation')->where('item_id',$id)->get();
        $likes = Like::join('review','review.review_id','=','like_relation.review_id')
            ->where('link_item_id',$item->item_id)
            ->select('review.review_id','likeOrDislike')
            ->get();
        /*find avg_rating*/
        $avg_rating = 0.0;
        $i=0;
        foreach($ratings as $rat){
            $i++;
            $avg_rating = $avg_rating + $rat->rating;
        }
        if($i!=0) $avg_rating = $avg_rating/$i;
        $user = array();
        foreach($review as $rev){
            $Auser = DB::table('users')->where('user_id',$rev->link_user_id)->first();
            array_push($user,$Auser);
        }
        return view('info_restaurant',['res'=>$res,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location,
            'user'=>$user,'avg_rating'=>$avg_rating,'rating_count'=>$i,'likes'=>$likes]);
    }
    function attr_info($id){
        $attr = DB::table('attraction')->where('link_item_id',$id)->first();
        $item = DB::table('item')->where('item_id',$id)->first();
        $photo = DB::table('photo_gallery')->where('link_item_id',$id)->first();
        $review = DB::table('review')->where('link_item_id',$id)->get();
        $location = DB::table('location')->where('link_item_id',$id)->first();
        $ratings = DB::table('rating_relation')->where('item_id',$id)->get();
        $likes = Like::join('review','review.review_id','=','like_relation.review_id')
                    ->where('link_item_id',$item->item_id)
                    ->select('review.review_id','likeOrDislike')
                    ->get();
        /*find avg_rating*/
        $avg_rating = 0.0;
        $i=0;
        foreach($ratings as $rat){
            $i++;
            $avg_rating = $avg_rating + $rat->rating;
        }
        if($i!=0) $avg_rating = $avg_rating/$i;
        $user = array();
        foreach($review as $rev){
            $Auser = DB::table('users')->where('user_id',$rev->link_user_id)->first();
            array_push($user,$Auser);
        }
        return view('info_attr',['attr'=>$attr,'item'=>$item,'photo'=>$photo,'review'=>$review,'location'=>$location,
            'user'=>$user,'avg_rating'=>$avg_rating,'rating_count'=>$i,'likes'=>$likes]);
    }
    function updateRating(Request $request){
        if(Rating::where('user_id',$request->user_id)->where('item_id',$request->item_id)->exists()){
            Rating::where('user_id',$request->user_id)->where('item_id',$request->item_id)->update(['rating'=>$request->rating]);
        }
        else{
            $rating_relation = new Rating();
            $rating_relation->user_id = $request->user_id;
            $rating_relation->item_id = $request->item_id;
            $rating_relation->rating = $request->rating;
            $rating_relation->save();
        }
        return redirect('/relogin');
    }
    function setLikeDislike(Request $request){
        $user = Session::get('user');
        if(! isset($user) ){
            return Redirect::back();
        }
        if( Like::where('user_id',$user[5])->where('review_id',$request->review_id)->exists()){
            Like::where('user_id',$user[5])->where('review_id',$request->review_id)->update(['likeOrDislike'=>$request->likeOrDislike]);
        }
        else{
            $likes = new Like();
            $likes->user_id = $user[5];
            $likes->review_id = $request->review_id;
            $likes->likeOrDislike = $request->likeOrDislike;
            $likes->save();
        }
        return redirect('/relogin');
    }
    function search(Request $request){
        $keyword = $request->in_search;
        $attraction = DB::table('item')
            ->join('attraction','item.item_id','=','attraction.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id');
        $restaurant = DB::table('item')
            ->join('restaurant','item.item_id','=','restaurant.link_item_id')
            ->join('location','item.item_id','=','location.link_item_id');
        $attraction = $attraction->where('item.title','LIKE','%'.$keyword.'%')->distinct()->get();//->orWhere('attraction.attraction_type','LIKE','%'.$keyword.'%')->get();
        $restaurant = $restaurant->where('item.title','LIKE','%'.$keyword.'%')->distinct()->get();//->orWhere('restaurant.food_type','LIKE','%'.$keyword.'%')->get();

        return view('search_page',['attraction'=>$attraction,'restaurant'=>$restaurant]);
    }



//====================================================== user ==========================================================
    function register_page(){
            return view('registor');
    }
    function register(Request $request){
        $current_user = Session::get('user');
        //-----------------------upload image-----------------------//
        $file = Input::file('profile_picture');
        $filepath = null;
        if($file !=null) {
            $destinationPath = 'img/';
            $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            Input::file('profile_picture')->move($destinationPath, $filename);
             $filepath = '/' . $destinationPath . $filename;
        }
        //----------------------------------------------------------//
        if(!isset($current_user)) {
            $email = $request->in_new_email;
            $password = $request->in_new_password;
            $password2 = $request->in_new_repassword;
            if ($password != $password2) return "The password must consistency.";
            if (DB::table('users')->where('email', $email)->count() >= 1) {
                return "This email is already exit.";
            }
            $last_id = 0;
            if (($count = DB::table('users')->count()) != 0) {
                $last_id = DB::table('users')->skip($count - 1)->first()->user_id;
            }
            $user = new User();
            $user->image = $filepath;
            $user->user_id = $last_id + 1;
            $user->email = $email;
            $user->password = sha1($password);
            $user->Fname = $request->in_Fname;
            $user->Lname = $request->in_Lname;
            $user->birthday = $request->in_birthday;
            $user->gender = $request->sex;
            $user->nationality = $request->country;
            $user->type = $request->in_type;
            $this_id = $user->user_id;
            $user->save();
            Session::put('user', [$user->email, $user->Fname, $user->Lname, $user->gender, $user->type, $user->user_id, null, $user->password, null, $user->birthday, $user->nationality, $user->image]);
        }
        else {
            $this_id = $current_user[5];
            $password = $request->in_new_password;
            $password2 = $request->in_new_repassword;
            if ($password != $password2) return "The password must consistency.";
            if($file==null) $filepath= $current_user[11];
            User::where('email', $current_user[0])->update(['password' => sha1($password), 'Fname' => $request->in_Fname
                , 'Lname' => $request->in_Lname, 'birthday' => $request->in_birthday, 'gender' => $request->sex, 'nationality' => $request->country,'image'=>$filepath]);
            return redirect('/relogin/profile'.$this_id);
        }
        return redirect('/view_profile/'.$this_id);
    }
    function logout(){
        Session::put('user',null);
        return Redirect::to('/');
    }
    function login(Request $request){
        $email = $request->in_email;
        $password = $request->in_password;
        $password = sha1($password);
        $num  = DB::table('users')->where('email',$email)->where('password',$password)->count();
        if ($num>=1){
            $user = DB::table('users')->where('email',$email)->where('password',$password)->first();
            $ratings = DB::table('rating_relation')
                ->join('users','users.user_id','=','rating_relation.user_id')
                ->select('rating','item_id')
                ->where('users.user_id',$user->user_id)
                ->get();
            $likes = DB::table('like_relation')
                ->join('users','users.user_id','=','like_relation.user_id')
                ->select('likeOrDislike','review_id')
                ->where('users.user_id',$user->user_id)
                ->get();
            $arr=[$user->email,$user->Fname,$user->Lname,$user->gender,$user->type,$user->user_id,$ratings,$user->password,$likes,$user->birthday,$user->nationality,$user->image];
            Session::put('user',$arr);
            return Redirect::back();
        }
        else{
            return "Wrong Email or Password.";
        }
    }
    function reLogin($return_path = null){
        $temp = Session::get('user');
        if($temp!=null){
            $email = $temp[0];
            $password = $temp[7];
            /*$password = sha1($password);*/
            $num  = DB::table('users')->where('email',$email)->where('password',$password)->count();
            if ($num>=1){
                $user = DB::table('users')->where('email',$email)->where('password',$password)->first();
                $ratings = DB::table('rating_relation')
                    ->join('users','users.user_id','=','rating_relation.user_id')
                    ->select('rating','item_id')
                    ->where('users.user_id',$user->user_id)
                    ->get();
                $likes = DB::table('like_relation')
                    ->join('users','users.user_id','=','like_relation.user_id')
                    ->select('likeOrDislike','review_id')
                    ->where('users.user_id',$user->user_id)
                    ->get();
                $arr=[$user->email,$user->Fname,$user->Lname,$user->gender,$user->type,$user->user_id,$ratings,$user->password,$likes,$user->birthday,$user->nationality,$user->image];
                Session::put('user',$arr);
            }
        }
        if($return_path == null )return Redirect::back();
        else if(substr($return_path,0,7)=="profile") return redirect('/view_profile/'.substr($return_path,7));
        else return 'wrong path';
    }
    function viewProfile($id){
        $user = User::where('user_id',$id)->first();
        $review = Review::where('link_user_id',$id)->get();
        return view('profile',['user'=>$user,'review'=>$review]);
    }
    
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
        $isAttracionReview = DB::table('item')->where('item_id',$request->hidden_value)->join('attraction','item.item_id','=','attraction.link_item_id')->count();
        $isRestaurantReview = DB::table('item')->where('item_id',$request->hidden_value)->join('restaurant','item.item_id','=','restaurant.link_item_id')->count();
        if($isAttracionReview==1) return redirect('/page_travel/info/'.$request->hidden_value);
        else if($isRestaurantReview==1) return redirect('/page_restaurant/info/'. $request->hidden_value);
        else return redirect('/page_event/info/'. $request->hidden_value);
    }
    function remove_review(Request $request){
        DB::table('review')
            ->where('review_id',$request->review_id)
            ->delete();
        return Redirect::back();
    }
    function remove_item(Request $request){
        $current_user = Session::get('user');
        if(isset($current_user) && $current_user[4]=="Admin"){
            Location::where('link_item_id',$request->item_id)->delete();
            if(Attraction::where('link_item_id',$request->item_id)->exists()){
                Attraction::where('link_item_id',$request->item_id)->delete();
            }
            else if(Restaurant::where('link_item_id',$request->item_id)->exists()){
                Restaurant::where('link_item_id',$request->item_id)->delete();
            }
            else if(Event::where('link_item_id',$request->item_id)->exists()){
                Event::where('link_item_id',$request->item_id)->delete();
            }
            Item::where('item_id',$request->item_id)->delete();
        }
        return redirect('/');
    }
//======================================    adding new item   ====================================================
    function addAttraction(Request $request){
    $current_user = Session::get('user');
    if(!isset($current_user)){
        return 'you must login first.';
    }
    else {
        $id_tmp=0;
        if ( ($count = Item::count()) != 0 ){
            $id_tmp =  Item::skip($count -1)->first()->item_id;
        }
        $id_tmp = $id_tmp + 1;
        $item = new Item();
        $attraction = new Attraction();
        $location = new Location();
        $photo = new PhotoGallery();
        /*---------------------upload_picture-----------------------*/
        $file = Input::file('profile_picture');
        if ($file != null) {
            $destinationPath = 'img/';
            $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            Input::file('profile_picture')->move($destinationPath, $filename);
            $num_photo = (DB::table('photo_gallery')->count());
            $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo - 1)->first()->photo_id) + 1;
            $photo->link_item_id = $id_tmp;
            $photo->photo_url = '/' . $destinationPath . $filename;
            $item->title_picture = $photo->photo_url;
            $photo->save();
        }
        /*---------------------------------------------------------*/
        $item->item_id = $id_tmp;
        $item->title = $request->in_new_title;
        $item->description = $request->in_new_description;
        $item->tel = $request->in_new_tel;
        $item->user_id = $current_user[5];
        if($current_user[4]=="Admin") $item->isApproved = 1;
        else $item->isApproved = 0;

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

        $item->save();
        $location->save();
        $attraction->save();
        return redirect('/page_travel/info/' . $id_tmp);
    }
}
    function editAttraction($item_id){

        $item = Item::where('item_id',$item_id)->first();
        $attraction = Attraction::where('link_item_id',$item_id)->first();
        $location = Location::where('link_item_id',$item_id)->first();
        return view('add_new_attraction',['item'=>$item,'attraction'=>$attraction,'location'=>$location]);
    }
    function updateAttraction(Request $request){
        $current_user = Session::get('user');
        if(isset($current_user)) {
            $isOwner = Item::where('user_id', $current_user[5])->where('item_id', $request->item_id)->exists();
            if ($current_user[4] == "Admin" || $isOwner) {
                $item = Item::where('item_id', $request->item_id);
                $attraction = Attraction::where('link_item_id', $request->item_id);
                $location = Location::where('link_item_id', $request->item_id);
                $photo = new PhotoGallery();
                /*---------------------upload_picture-----------------------*/
                $file = Input::file('profile_picture');
                if ($file != null) {

                    $destinationPath = 'img/';
                    $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
                    Input::file('profile_picture')->move($destinationPath, $filename);
                    $num_photo = (DB::table('photo_gallery')->count());
                    $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo - 1)->first()->photo_id) + 1;
                    $photo->link_item_id = $request->item_id;
                    $photo->photo_url = '/' . $destinationPath . $filename;
                    $item->title_picture = $photo->photo_url;
                    $photo->save();
                }
                /*---------------------------------------------------------*/
                $item->title = $request->in_new_title;
                $item->description = $request->in_new_description;
                $item->tel = $request->in_new_tel;
                $item->user_id = $current_user[5];
                if($current_user[4]=='Admin') $item->isApproved = 1;
                else $item->isApproved = 0;

                $attraction->attraction_type = $request->in_new_type;
                $attraction->activity = $request->in_new_activity;
                $attraction->entrance_fee = $request->in_new_entrancefee;
                $attraction->oc_time = $request->in_new_oc_time;
                $attraction->parking = $request->in_new_parking;
                $attraction->website_url = $request->in_new_web_url;

                $location->hint = $request->in_new_hint;
                $location->build = $request->in_new_build;
                $location->street_address = $request->in_new_street_address;
                $location->sub_district = $request->in_new_sub_dis;
                $location->district = $request->in_new_district;
                $location->province = $request->in_new_province;
                $location->postal_code = $request->in_new_post_code;
                $location->lat = $request->in_new_lat;
                $location->long = $request->in_new_lng;

                $item->update(['title' => $item->title,'description'=>$item->description,'tel'=>$item->tel,'isApproved'=>$item->isApproved,
                    'title_picture'=>$item->title_picture
                ]);
                $location->update(['hint'=>$location->hint,
                    'build'=>$location->build,
                    'street_address'=>$location->street_address,
                    'sub_district'=>$location->sub_district,
                    'district' =>$location->district,
                    'province' =>$location->province,
                    'postal_code'=>$location->postal_code,
                    'lat'=>$location->lat,
                    'long'=>$location->long
                ]);
                $attraction->update([
                    'attraction_type'=>$attraction->attraction_type,
                    'activity'=>$attraction->activity,
                'entrance_fee'=>$attraction->entrance_fee,
                'oc_time'=>$attraction->oc_time ,
                'parking'=>$attraction->parking ,
                'website_url'=>$attraction->website_url
                ]);
                return redirect('/page_travel/info/' . $request->item_id);
            }
        }
        return 'fail to authorize permission.';
    }
    function approve(Request $request){
        $current_user = Session::get('user');
        if(isset($current_user) && $current_user[4]=="Admin"){
            Item::where('item_id',$request->item_id)->update(["isApproved"=>$request->isApproved]);
        }
        return Redirect::back();
    }
    function addRestaurant(Request $request){
        $current_user = Session::get('user');
        if(!isset($current_user)){
            return 'you must login first.';
        }
        else {
            $id_tmp=0;
            if ( ($count = Item::count()) != 0 ){
                $id_tmp =  Item::skip($count -1)->first()->item_id;
            }
            $id_tmp = $id_tmp+1;
            $item = new Item();
            $restaurant = new Restaurant();
            $location = new Location();
            $photo = new PhotoGallery();
            /*---------------------upload_picture-----------------------*/
            $file = Input::file('profile_picture');
            if ($file != null) {
                $destinationPath = 'img/';
                $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
                Input::file('profile_picture')->move($destinationPath, $filename);
                $num_photo = (DB::table('photo_gallery')->count());
                $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo - 1)->first()->photo_id) + 1;
                $photo->link_item_id = $id_tmp;
                $photo->photo_url = '/' . $destinationPath . $filename;
                $item->title_picture = $photo->photo_url;
                $photo->save();
            }
            /*---------------------------------------------------------*/
            $item->item_id = $id_tmp;
            $item->title = $request->in_new_title;
            $item->description = $request->in_new_description;
            $item->tel = $request->in_new_tel;
            $item->user_id = $current_user[5];
            if($current_user[4]=="Admin") $item->isApproved = 1;
            else $item->isApproved = 0;

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
            $location->sub_district = $request->in_new_sub_dis;
            $location->district = $request->in_new_district;
            $location->province = $request->in_new_province;
            $location->postal_code = $request->in_new_post_code;
            $location->lat = $request->in_new_lat;
            $location->long = $request->in_new_lng;
            $location->link_item_id = $id_tmp;

            $item->save();
            $location->save();
            $restaurant->save();
            return redirect('/page_restaurant/info/' . $id_tmp);
        }
    }
    function editRestaurant($item_id){
        $item = Item::where('item_id',$item_id)->first();
        $res= Restaurant::where('link_item_id',$item_id)->first();
        $location = Location::where('link_item_id',$item_id)->first();
        return view('add_new_restaurant',['item'=>$item,'res'=>$res,'location'=>$location]);
    }
    function updateRestaurant(Request $request){
        $current_user = Session::get('user');
        if(isset($current_user)) {
            $isOwner = Item::where('user_id', $current_user[5])->where('item_id', $request->item_id)->exists();
            if ($current_user[4] == "Admin" || $isOwner) {
                $item = Item::where('item_id', $request->item_id);
                $restaurant = Restaurant::where('link_item_id', $request->item_id);
                $location = Location::where('link_item_id', $request->item_id);
                $photo = new PhotoGallery();
                /*---------------------upload_picture-----------------------*/
                $file = Input::file('profile_picture');
                if ($file != null) {
                    $destinationPath = 'img/';
                    $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
                    Input::file('profile_picture')->move($destinationPath, $filename);
                    $num_photo = (DB::table('photo_gallery')->count());
                    $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo - 1)->first()->photo_id) + 1;
                    $photo->link_item_id = $request->item_id;
                    $photo->photo_url = '/' . $destinationPath . $filename;
                    $item->title_picture = $photo->photo_url;
                    $photo->save();
                }
                /*---------------------------------------------------------*/
                $item->title = $request->in_new_title;
                $item->description = $request->in_new_description;
                $item->tel = $request->in_new_tel;
                $item->user_id = $current_user[5];
                if($current_user[4]=='Admin') $item->isApproved = 1;
                else $item->isApproved = 0;

                $restaurant->price_range = $request->in_new_price_range;
                $restaurant->food_type = $request->in_new_food_type;
                $restaurant->oc_time = $request->in_new_oc_time;
                $restaurant->credit_card = $request->in_new_credit_card;
                $restaurant->child_appropriate = $request->in_new_child_appropriate;
                $restaurant->reservable = $request->in_new_reservable;
                $restaurant->parking = $request->in_new_parking;

                $location->hint = $request->in_new_hint;
                $location->build = $request->in_new_build;
                $location->street_address = $request->in_new_street_address;
                $location->sub_district = $request->in_new_sub_dis;
                $location->district = $request->in_new_district;
                $location->province = $request->in_new_province;
                $location->postal_code = $request->in_new_post_code;
                $location->lat = $request->in_new_lat;
                $location->long = $request->in_new_lng;

                $item->update(['title' => $item->title,'description'=>$item->description,'tel'=>$item->tel,'isApproved'=>$item->isApproved,
                    'title_picture'=>$item->title_picture]);
                $location->update(['hint'=>$location->hint,
                    'build'=>$location->build,
                    'street_address'=>$location->street_address,
                    'sub_district'=>$location->sub_district,
                    'district' =>$location->district,
                    'province' =>$location->province,
                    'postal_code'=>$location->postal_code,
                    'lat'=>$location->lat,
                    'long'=>$location->long
                ]);
                $restaurant->update([
                    'price_range' => $request->in_new_price_range,
                    'food_type' => $request->in_new_food_type,
                    'oc_time' => $request->in_new_oc_time,
                    'credit_card' => $request->in_new_credit_card,
                    'child_appropriate' => $request->in_new_child_appropriate,
                    'reservable' => $request->in_new_reservable,
                    'parking' => $request->in_new_parking
                ]);
                return redirect('/page_restaurant/info/' . $request->item_id);
            }
        }
        return 'fail to authorize permission.';
    }
    function addEvent(Request $request){
        $current_user = Session::get('user');
        if(!isset($current_user)){
            return 'you must login first.';
        }
        else {
            $id_tmp=0;
            if ( ($count = Item::count()) != 0 ){
                $id_tmp =  Item::skip($count -1)->first()->item_id;
            }
            $id_tmp = $id_tmp+1;
            $item = new Item();
            $event = new Event();
            $location = new Location();
            $photo = new PhotoGallery();
            /*---------------------upload_picture-----------------------*/
            $file = Input::file('profile_picture');
            if ($file != null) {
                $destinationPath = 'img/';
                $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
                Input::file('profile_picture')->move($destinationPath, $filename);
                $num_photo = (DB::table('photo_gallery')->count());
                $photo->photo_id = (DB::table('photo_gallery')->skip($num_photo - 1)->first()->photo_id) + 1;
                $photo->link_item_id = $id_tmp;
                $photo->photo_url = '/' . $destinationPath . $filename;
                $item->title_picture = $photo->photo_url;
                $photo->save();
            }
            /*---------------------------------------------------------*/
            $item->item_id = $id_tmp;
            $item->title = $request->in_new_title;
            $item->description = $request->in_new_description;
            $item->tel = $request->in_new_tel;
            $item->user_id = $current_user[5];
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
            $location->postal_code = $request->in_new_post_code;
            $location->lat = $request->in_new_lat;
            $location->long = $request->in_new_lng;
            $location->link_item_id = $id_tmp;

            $item->save();
            $location->save();
            $event->save();
            return redirect('/page_event/info/' . $id_tmp);
        }
}



//======================================   go to adding new item page   ==============================================
    function createNewAttraction(){
        return view('add_new_attraction');
    }
    function createNewRestaurant(){
        return view('add_new_restaurant');
    }
    function createNewEvent(){
        return view('add_new_event');
    }

    function ranking(){
        $review = DB::table('users')->join('review','review.link_user_id','=','users.user_id')->get();
        $review_collection = array();
        foreach($review as $idx){
            array_push($review_collection,$idx->user_id);
        }
        $review_collection = array_count_values($review_collection);
        arsort($review_collection);
        $users = array();
        foreach($review_collection as $collection => $num_of_review){
            $tmp = DB::table('users')->where('user_id',$collection)->get();
            array_push($tmp,$num_of_review);
            array_push($users,$tmp);
        }
        return view('ranking',['users'=>$users]);

    }

// ======================= Article Controller ========================    
    function page_article($page) {
        $num_of_article =  DB::table('article')->count();
        $num_of_page = intval($num_of_article/20) + 1;
        if($page < 1) $page = 1;
        else if ($page > $num_of_page) $page = $num_of_page;
        $article = DB::table('article')
            ->skip(20*($page - 1))
            ->take(20)
            ->get();
        return view('article', ['article'=>$article, 'page'=>$page, 'last_page'=>$num_of_page]);
    }

    function art_info($id) {
        $art = DB::table('article')->where('article_id',$id)->first();
        return view('info_article',['art'=>$art]);
    }

    // function remove_article(Request $request){
    //     DB::table('article')
    //         ->where('article_id',$request->article_id)
    //         ->delete();
    //     return Redirect::back();
    // }

}
