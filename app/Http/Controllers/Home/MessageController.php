<?php
/*
 * this is the controller for message-related functions
 * this controller is used to create-retrieve-update-delete DB records of messages
 * this controller corresponds to the table "ct_message"
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\Item;
use App\Models\Category;

class MessageController extends Controller {
    
    // message detail
    public function messageRetrieveDetail() {
        if (!session("user_id") || !session("user_name")) {
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $message_id = Input::get("message_id");
            Message::where("id", $message_id)->first();
            return view();
        }
    }
    
    // detail page for contacting a seller
    public function messageCreateDetail() {
        $item_id = Input::get("item_id");
        $empty_flag = Input::get("empty_flag");
        $search_txt = $empty_flag ? "" : Input::get("search_txt");
        
        if (!session("user_id") || !session("user_name")) {
            session()->put("redirection", "messagecreatedetail?item_id=".$item_id);
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $item = Item::select("item.*", "user.username", "user.id as to_user_id", "category.title as category_title")
                    ->join("user", "item.user_id", "=", "user.id")              // inner joint search for receiver
                    ->join("category", "item.category_id", "=", "category.id")  // inner joint search for category
                    ->where("item.id", $item_id)
                    ->first();
            $category = Category::where("depth", 0)->get();
            $category_id = $item->category_id;
            $category_title = $item->category_title;
            return view("Home/messageCreateDetail", compact("item", "category", "category_id", "category_title", "search_txt"));
        }
    }
    
    // message detail
    public function messageUpdateDetail() {
        $message_id = Input::get("message_id");
        if (!session("user_id") || !session("user_name")) {
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $message = Message::select("message.*", "from_user.username as from_username", "to_user.username as to_username", 
                    "item.price", "item.title_img", "item.title")
                    ->join(DB::raw("user from_user"), "message.from_user_id", "=", "from_user.id")  // inner joint search for sender
                    ->join(DB::raw("user to_user"), "message.to_user_id", "=", "to_user.id")        // inner joint search for receiver
                    ->join("item", "message.item_id", "=", "item.id")                               // inner joint search for item details
                    ->where("message.id", $message_id)
                    ->first();
            $category = Category::where("depth", 0)->get();
            return view("Home/messageUpdateDetail", compact("message", "category"));
        }
    }
    
    // dashboard for messages
    public function messageRetrieve() {
        if (!session("user_id") || !session("user_name")) {
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            if (session("user_priority")) {         // for admin user, search all the messages
                $message = Message::select("message.*", "from_user.username as from_username", "to_user.username as to_username")
                        ->join(DB::raw("user from_user"), "message.from_user_id", "=", "from_user.id")  // inner joint search for sender
                        ->join(DB::raw("user to_user"), "message.to_user_id", "=", "to_user.id")        // inner joint search for receiver
                        ->orderBy("created_at", "desc")
                        ->paginate(10);
            } else {                                // for registered user, search only the messages related to him/her
                $message = Message::select("message.*", "from_user.username as from_username", "to_user.username as to_username")
                        ->join(DB::raw("user from_user"), "message.from_user_id", "=", "from_user.id")  // inner joint search for sender
                        ->join(DB::raw("user to_user"), "message.to_user_id", "=", "to_user.id")        // inner joint search for receiver
                        ->where("message.from_user_id", session("user_id"))
                        ->orWhere("message.to_user_id", session("user_id"))
                        ->orderBy("created_at", "desc")
                        ->paginate(10);
            }
            $leftnavbar = "message";
            $category = Category::where("depth", 0)->get();
            return view("Home/messageRetrieve", compact("message", "leftnavbar", "category"));
        }
    }
    
    // send a message
    public function messageCreate() {
        $message = Input::get();
        Message::firstOrCreate($message);
    }
}


?>