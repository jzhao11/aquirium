<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
// use App\Models\News;
// use App\Models\Cases;
// use App\Models\Contact;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller {
    private $ismobile;
    
    public function __construct() {
        $this->ismobile = ismobile();
        
    }
    
    public function testdownload() {
        $file_url = "http://www6.tjctime.com/mshow/public/uploads/image/20170728/1501231386122.png";
        echo filedownload($file_url);
    }
    
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
                ->get();
        
        if (!count($item)) {
            $item = Item::whereRaw($category_cond)
                    ->whereRaw("status < 2")
                    ->orderBy($order_by, $order)
                    ->get();
        }
        
        $category = Category::where("depth", 0)->get();
        $filter = $category_id ? Category::where("parent_id", $category_id)->get() : $category;
        return view("Home/index", compact("category", "filter", "item", "search_txt", "category_id"));
    }
    
    public function about() {
        $admin = Admin::orderby("id", "asc")->get();
        return view("Home/about", compact("admin"));
    }
    
    public function personal() {
        $id = Input::get("id");
        $admin = Admin::where("id", $id)->first();
        return view("Home/personal", compact("admin"));
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