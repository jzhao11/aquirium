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

class MessageController extends Controller {
    
    public function messageRetrieveDetail() {
        if (!session("user_id") || !session("user_name")) {
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $message_id = Input::get("message_id");
            Message::where("id", $message_id)->first();
            return view();
        }
    }
    
    public function messageCreateDetail() {
        $item_id = Input::get("item_id");
        if (!session("user_id") || !session("user_name")) {
            session()->put("redirection", "messagecreatedetail?item_id=".$item_id);
            return redirect()->action("Home\\HomeController@loginDetail");
        } else {
            $item = Item::select("item.*", "user.username", "user.id as to_user_id")
                    ->join("user", "item.user_id", "=", "user.id")
                    ->where("item.id", $item_id)
                    ->first();
            return view("Home/messageCreateDetail", compact("item"));
        }
    }
    
    public function messageRetrieve() {
        $message = Message::select("message.*", "from_user.username as from_username", "to_user.username as to_username")
                    ->join(DB::raw("user from_user"), "message.from_user_id", "=", "from_user.id")
                    ->join(DB::raw("user to_user"), "message.to_user_id", "=", "to_user.id")
                    ->where("message.from_user_id", session("user_id"))
                    ->orWhere("message.to_user_id", session("user_id"))
                    ->orderBy("created_at", "desc")
                    ->paginate(5);
        $leftnavbar = "message";
        return view("Home/messageRetrieve", compact("message", "leftnavbar"));
    }
    
    public function messageCreate() {
        $message = Input::get();
        Message::firstOrCreate($message);
    }
    
    public function messageDelete() {
    }
}


?>