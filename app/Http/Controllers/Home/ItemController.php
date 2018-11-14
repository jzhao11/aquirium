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
    
    public function itemRetrieve() {
        $item = Item::orderBy("created_at", "desc")->get();
        $leftnavbar = "item";
        return view("Home/itemRetrieve", compact("item", "leftnavbar"));
    }
    
    public function itemCreateDetail() {
        $category = Category::where("depth", 0)->get();
        return view("Home/itemCreateDetail", compact("category"));
    }
    
    public function itemUpdateDetail() {
        $id = Input::get("id");
        $category = Category::where("depth", 0)->get();
        $item = Item::where("id", $id)->first();
        return view("Home/itemUpdateDetail", compact("category", "item"));
    }
    
    public function itemCreate() {
        $input = Input::get();
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);
                $input[$key] = $url;
            }
        }
        
        Item::firstOrCreate($input);
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    public function itemUpdate() {
        $input = Input::get();
        $id = $input["id"];
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);
                $input[$key] = $url;
            }
        }
        
        Item::where("id", $id)->update($input);
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    public function itemDelete() {
        $id = Input::get("id");
        Item::where("id", $id)->delete();
        return redirect()->action("Home\\ItemController@itemRetrieve");
    }
    
    
    
    
    public function itemRetrieveDetail() {
        $id = Input::get("id");
        $item = Item::where("id", $id)->first();
        $category = Category::where("depth", 0)->get();
        return view("Home/itemRetrieveDetail", compact("item", "category"));
    }
    
    public function retrieveByUser($user_id) {
        return "ItemController/retrieveByUser".$user_id;
    }
}


?>