<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\User;

class UserController extends Controller {
    
    public function userRetrieveDetail() {
    }
    
    public function userCreateDetail() {
    }
    
    public function userUpdateDetail() {
        $id = Input::get("id");
        return "UserController/updateDetail";
    }
    
    public function userRetrieve() {
        $user = User::orderBy("created_at", "desc")->get();
        $leftnavbar = "user";
        return view("Home/userRetrieve", compact("user", "leftnavbar"));
    }
    
    public function userCreate() {
        $input = Input::get();
        $input["password"] = md5($input["password"]);
        
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);
                $input[$key] = $url;
            }
        }
        
        User::firstOrCreate($input);
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    public function userUpdate() {
    }
    
    public function userDelete() {
    }
}


?>