<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller {
    public function itemretrieve() {
        $item = Item::orderBy("created_at", "desc")->get();
        return view("Home/itemretrieve", compact("item"));
    }
    
    public function itemcreatedetail() {
        $category = Category::where("depth", 0)->get();
        return view("Home/itemcreatedetail", compact("category"));
    }
    
    public function itemupdatedetail($id) {
        $category = Category::where("depth", 0)->get();
        $item = Item::where("id", $id)->first();
        return view("Home/itemupdatedetail", compact("category", "item"));
    }
    
    public function itemcreate() {
        $input = Input::get();
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);
                $input[$key] = $url;
            }
        }
        
        Item::firstOrCreate($input);
        return redirect()->action("Home\\ItemController@itemretrieve");
    }
    
    public function itemupdate($id) {
        $input = Input::get();
        foreach ($_FILES as $key => $file) {
            if ($file['tmp_name']) {
                $url = fileupload($file);
                $input[$key] = $url;
            }
        }
        
        Item::where("id", $id)->update($input);
        return redirect()->action("Home\\ItemController@itemretrieve");
    }
    
    public function itemdelete($id) {
        Item::where("id", $id)->delete();
        return redirect()->action("Home\\ItemController@itemretrieve");
    }
    
    
    
    
    public function retrieveDetail($id) {
        return "ItemController/retrieveDetail".$id;
    }
    
    public function retrieveByUser($user_id) {
        return "ItemController/retrieveByUser".$user_id;
    }
}


?>