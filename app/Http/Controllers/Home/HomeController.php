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

class HomeController extends Controller {
    
    public function index() {
        $filter_id = Input::get("filter_id");
        $category_id = Input::get("category_id");
        $search_txt = Input::get("search_txt");
        $order_by = "created_at";
        $order = "desc";
        $category_cond = $category_id ? "category_id = ".$category_id : "category_id >= 0";
        $filter_cond = $filter_id ? "filter_id = ".$filter_id : "filter_id >= 0";
        $item = Item::whereRaw($category_cond)
                ->whereRaw($filter_cond)
                ->whereRaw("status < 2")
                ->whereRaw("title like '%".$search_txt."%'")
                // or description like '%".$search_txt."%'
                ->orderBy($order_by, $order)
                ->paginate(6);
        
        $empty_flag = 0;
        if (!count($item)) {
            $item = Item::whereRaw($category_cond)
                    ->whereRaw("status < 2")
                    ->orderBy($order_by, $order)
                    ->paginate(6);
            $empty_flag = 1;
        }
        
        $category = Category::where("depth", 0)->get();
        $filter = $category_id ? Category::where("parent_id", $category_id)->get() : $category;
        return view("Home/index", compact("category", "filter", "item", "search_txt", "category_id", "empty_flag"));
    }
    
    public function about() {
        $about = About::orderby("id", "asc")->get();
        return view("Home/about", compact("about"));
    }
    
    public function personal() {
        $id = Input::get("id");
        $about = About::where("id", $id)->first();
        return view("Home/personal", compact("about"));
    }
    
    public function logindetail() {
        return view("Home/login");
    }
}

?>