<?php
/*
 * this is the controller for user-related functions
 * this controller is used to create-retrieve-update-delete DB records of users
 * this controller corresponds to the table "ct_user"
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller {
    
    // dummy (not p1 function)
    public function userRetrieveDetail() {
    }
    
    // detail page for user info update
    public function userUpdateDetail() {
        $id = Input::get("id");
        return "UserController/updateDetail";
    }
    
    // dashboard for users
    public function userRetrieve() {
        if (session("user_priority") != 1) {
            return redirect()->action("Home\\ItemController@itemRetrieve");
        } else {
            $user = User::where("priority", 0)->orderBy("username", "asc")->paginate(10);   // 10 users in each page
            $leftnavbar = "user";
            $category = Category::where("depth", 0)->get();
            return view("Home/userRetrieve", compact("user", "leftnavbar", "category"));
        }
    }
    
    // dummy (not p1 function)
    public function userUpdate() {
    }
    
    // delete user
    public function userDelete() {
        $user_id = Input::get("user_id");
        User::where("id", $user_id)->delete();
        return redirect()->action("Home\\UserController@userRetrieve");
    }
}


?>