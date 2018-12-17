<?php
/*
 * this is the controller for item-related functions
 * this controller is used to create-retrieve-update-delete DB records of items
 * this controller corresponds to the table "ct_item"
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller {
    
    // dashboard for items
    public function itemRetrieve() {
        if (!session("user_id") || !session("user_name")) {
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            if (session("user_priority")) {
                $item = Item::select("item.*", "user.username")
                        ->join("user", "item.user_id", "=", "user.id")
                        ->orderBy("created_at", "desc")
                        ->paginate(10);                     // 10 items in each page
            } else {
                $user_id = session("user_id");
                $item = Item::select("item.*", "user.username")
                        ->join("user", "item.user_id", "=", "user.id")
                        ->where("user_id", $user_id)
                        ->orderBy("created_at", "desc")
                        ->paginate(10);                     // 10 items in each page
            }
            $leftnavbar = "item";
            $category = Category::where("depth", 0)->get();
            return view("Home/itemRetrieve", compact("item", "leftnavbar", "category"));
        }
    }
    
    // detail page for posting an item
    public function itemCreateDetail() {
        $category = Category::where("depth", 0)->get();
        return view("Home/itemCreateDetail", compact("category"));
    }
    
    // detail page for editing/approving an item
    // registered user can edit his/her items
    // admin user can approve/reject all the items
    public function itemUpdateDetail() {
        $item_id = Input::get("item_id");
        $category = Category::where("depth", 0)->get();
        $item = Item::where("id", $item_id)->first();
        return view("Home/itemUpdateDetail", compact("category", "item"));
    }
    
    // post an item
    public function itemCreate() {
        $item = Input::get();
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);                   // upload image
                $item[$key] = $url;
            }
        }
        
        if (!session("user_id") || !session("user_name")) {
            session()->put("item", $item);
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $item["user_id"] = session("user_id");
            Item::firstOrCreate($item);
            session()->forget("item");
            return redirect()->action("Home\\ItemController@itemRetrieve");
        }
    }
    
    // edit/approve an item
    public function itemUpdate() {
        $item = Input::get();
        $item_id = $item["id"];
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);                   // upload image
                $item[$key] = $url;
            }
        }
        
        Item::where("id", $item_id)->update($item);
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    // delete an item
    public function itemDelete() {
        $id = Input::get("id");
        Item::where("id", $id)->delete();
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    // detail page for showing an item
    public function itemRetrieveDetail() {
        $item_id = Input::get("item_id");
        $empty_flag = Input::get("empty_flag");
        $search_txt = $empty_flag ? "" : Input::get("search_txt");
        $item = Item::select("item.*", "user.username", "category.title as category_title")
                ->join("user", "item.user_id", "=", "user.id")              // inner joint search for seller
                ->join("category", "item.category_id", "=", "category.id")  // inner joint search for category
                ->where("item.id", $item_id)
                ->first();
        $category = Category::where("depth", 0)->get();
        $category_id = $item->category_id;
        $category_title = $item->category_title;
        return view("Home/itemRetrieveDetail", compact("item", "category", "category_id", "category_title", "search_txt"));
    }
}


?>