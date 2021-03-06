<?php
/*
 * this is the controller for generating all the categories
 * the categories are managed by using nested set as data structure
 * the categories cannot be edited by any users in front end
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Category;

class CategoryController extends Controller {
    public function categoryretrieve() {
        $category = Category::all();
        return view("Home/categoryretrieve", compact("category"));
    }
    
    public function categorycreatedetail() {
        $category = Category::all();
        return view("Home/categorycreatedetail", compact("category"));
    }
    
    public function categoryupdatedetail($id) {
        $category = Category::where("id", $id)->first();
        return view("Home/categoryupdatedetail", ["category" => $category]);
    }
    
    public function categorycreate() {
        $input = Input::get();
        if ($input["parent_id"]) {
            //for non-root node
            $root = Category::where("id", $input["parent_id"])->first();
            $root->children()->create($input);
        } else {
            //for root node (no parent)
            $input["parent_id"] = NULL;
            Category::create($input);
        }
        
        return redirect()->action("Home\\CategoryController@categoryretrieve");
    }
    
    public function categoryupdate($id) {
        $input = Input::get();
        Category::where("id", $id)->update($input);
        
        return redirect()->action("Home\\CategoryController@categoryretrieve");
    }
    
    public function categorydelete() {
        $category_id = Input::get("category_id");
        $root = Category::where("id", $category_id)->first();
        $root->delete();
        
        return redirect()->action("Home\\CategoryController@categoryretrieve");
    }
}

?>