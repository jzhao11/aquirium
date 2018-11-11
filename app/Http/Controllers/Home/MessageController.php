<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Message;

class MessageController extends Controller {
    
    public function messageRetrieveDetail() {
    }
    
    public function messageCreateDetail() {
        return view("Home/messageCreateDetail");
    }
    
    public function messageUpdateDetail() {
        $id = Input::get("id");
    }
    
    public function messageRetrieve() {
        $message = Message::orderBy("created_at", "desc")->get();
        $leftnavbar = "message";
        return view("Home/messageRetrieve", compact("message", "leftnavbar"));
    }
    
    public function messageCreate() {
    }
    
    public function messageUpdate() {
    }
    
    public function messageDelete() {
    }
}


?>