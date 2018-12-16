<?php
/*
 * this is the controller for general purpose
 * this controller is used for home page, registration/login, and team's ABOUT page
 * this controller is also for filtering and searching results
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\About;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;

class HomeController extends Controller {
    
    // home page
    // retrieve items according to searching condition
    public function index() {
        session()->put("redirection", "itemretrieve");
        $filter_id = Input::get("filter_id");
        $category_id = Input::get("category_id");
        $search_txt = Input::get("search_txt");
        $order_by = "created_at";
        $order = "desc";
        $category_cond = $category_id ? "category_id = ".$category_id : "category_id >= 0";
        $filter_cond = $filter_id ? "filter_id = ".$filter_id : "filter_id >= 0";
        $item = Item::whereRaw($category_cond)      // category for searching
                ->whereRaw("status = 1")            // status 1 for approved items
                ->whereRaw("(title like '%".$search_txt."%' or description like '%".$search_txt."%')")  // approximate searching
                ->orderBy($order_by, $order)        // order by creation time
                ->paginate(9);                      // 9 items in each page
        
        $empty_flag = 0;
        if (!count($item)) {                        // if items not found, retrieve newly posted item to avoid empty page
            $item = Item::whereRaw($category_cond)
                    ->whereRaw("status = 1")
                    ->orderBy($order_by, $order)
                    ->paginate(9);
            $empty_flag = 1;
        }
        
        $category = Category::where("depth", 0)->orderBy("title", "asc")->get();
        $category_title = ($category_selected = Category::where("id", $category_id)->first()) ? $category_selected->title : "All";
        return view("Home/index", compact("category", "category_title", "item", "search_txt", "category_id", "empty_flag"));
    }
    
    // team about page (available in top navigation bar)
    public function about() {
        $about = About::orderby("id", "asc")->get();
        return view("Home/about", compact("about"));
    }
    
    // personal about page (available in team about page)
    public function personal() {
        $id = Input::get("id");
        $about = About::where("id", $id)->first();
        return view("Home/personal", compact("about"));
    }
    
    // login detail page
    public function loginDetail() {
        if (session("user_id") && session("user_name")) {
            return redirect()->action("Home\\ItemController@itemRetrieve");
        } else {
            $item = Input::get("item");             // lazy registration/login when posting an item
            return view("Home/logindetail", compact("item"));
        }
    }
    
    // registration detail page
    public function registerDetail() {
        if (session("user_id") && session("user_name")) {
            return redirect()->action("Home\\ItemController@itemRetrieve");
        } else {
            $item = Input::get("item");             // lazy registration/login when posting an item
            return view("Home/registerdetail", compact("item"));
        }
    }
    
    // login
    public function login() {
        $username = Input::get("username");
        $password = md5(Input::get("password"));
        $user = User::where("username", $username)->first();
        if (!$user) {                               // username not valid (not existing)
            return -1;
        } else if ($user->password != $password) {  // password not valid (not matching the username)
            return -2;
        } else {
            session()->put("user_id", $user->id);
            session()->put("user_name", $user->username);
            session()->put("user_priority", $user->priority);
            if (session("item")) {
                $item = session("item");
                $item["user_id"] = session("user_id");
                Item::firstOrCreate($item);
                session()->forget("item");
            }
            return 0;
        }
    }
    
    // registration
    public function register() {
        $user["username"] = Input::get("username");
        $user["stu_id"] = Input::get("stu_id");
        $user["password"] = md5(Input::get("password"));
        if (User::where("username", $user["username"])->first()) {
            return -1;                              // username not valid (duplicate username)
        } else {
            $user = User::firstOrCreate($user);
            session()->put("user_id", $user->id);
            session()->put("user_name", $user->username);
            session()->put("user_priority", $user->priority);
            if (session("item")) {
                $item = session("item");
                $item["user_id"] = session("user_id");
                Item::firstOrCreate($item);
                session()->forget("item");
            }
            return 0;
        }
    }
    
    // logout
    public function logout() {
        session()->flush();                         // session clearance
        return redirect()->action("Home\\HomeController@index");
    }
}

?>