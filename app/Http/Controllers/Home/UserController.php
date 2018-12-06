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

class UserController extends Controller {
    
    public function userRetrieveDetail() {
    }
    
    public function userUpdateDetail() {
        $id = Input::get("id");
        return "UserController/updateDetail";
    }
    
    public function userRetrieve() {
        if (session("user_priority") != 1) {
            return redirect()->action("Home\\ItemController@itemRetrieve");
        } else {
            $user = User::orderBy("created_at", "desc")->get();
            $leftnavbar = "user";
            return view("Home/userRetrieve", compact("user", "leftnavbar"));
        }
    }
    
    public function userUpdate() {
    }
    
    public function userDelete() {
    }
}


?>