<?php
/*
 * this is the extended controller for probable controller inheritance
 * when needed, this controller should be used as an inheritance layer btw class Controller and derived ones
 * this controller is currently inactive
 */

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

abstract class ExtendedController extends Controller {
    public function retrieveDetail($id) {
        return "ExtendedController/retrieveDetail".$id;
    }
    
    public function createDetail() {
        return "ExtendedController/createDetail";
    }
    
    public function updateDetail($id) {
        return "ExtendedController/updateDetail";
    }
    
    public function retrieve() {
        return "ExtendedController/retrieve";
    }
    
    public function create() {
        return "ExtendedController/create";
    }
    
    public function update($id) {
        return "ExtendedController/update";
    }
    
    public function delete($id) {
        return "ExtendedController/delete";
    }

//     public function news() {
//         $news = News::orderby('id', 'desc')->limit(3)->offset(0)->get();
//         $leftcase = Cases::orderby('id', 'desc')->limit(4)->offset(0)->get();
//         $rightcase = Cases::orderby('id', 'desc')->limit(4)->offset(4)->get();
//         $topnews = News::orderby('id', 'desc')->take(2)->get();
//         $news = News::orderby('id', 'desc')->paginate(4);
//         $view = $this->ismobile ? 'Home/news_phone' : 'Home/news_pc';
//         return view($view, compact('news', 'topnews'));
//     }
//     public function newsdetail() {
//         $news_id = Input::get('id');
//         $news = News::where('id', $news_id)->first();
//         $news_prev = News::where('id', '<', $news_id)->orderby('id', 'desc')->first();
//         $news_next = News::where('id', '>', $news_id)->orderby('id', 'asc')->first();
//         return view('Home/newsdetail', compact('news', 'news_prev', 'news_next'));
//     }
}


?>