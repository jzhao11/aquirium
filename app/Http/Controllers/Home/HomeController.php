<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\News;
use App\Models\Cases;
use App\Models\About;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Partner;


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
        $partner = Partner::orderby('level', 'desc')->get();
        $news = News::orderby('id', 'desc')->limit(3)->offset(0)->get();
        $firstnews = News::orderby('id', 'desc')->first();
        $leftcase = Cases::orderby('id', 'desc')->limit(4)->offset(0)->get();
        $rightcase = Cases::orderby('id', 'desc')->limit(4)->offset(4)->get();
        $view = $this->ismobile ? 'Home/index_phone' : 'Home/index_pc';
        return view($view, compact('news', 'firstnews', 'leftcase', 'rightcase', 'partner'));
    }
    
    public function about($id) {
        return view("Home/about".$id);
        
//         $partner = Partner::orderby('level', 'desc')->get();
//         $about = About::first();
//         $view = $this->ismobile ? 'Home/about_phone' : 'Home/about_pc';
//         return view($view, compact('about', 'partner'));
    }
    
    public function contact() {
        $view = $this->ismobile ? 'Home/contact_phone' : 'Home/contact_pc';
        return view($view);
    }
    
    public function contactcreate() {
        $input = Input::get();
        return Contact::firstOrCreate($input);
    }
    
    public function cases() {
        $case_all = Cases::orderby('id', 'desc')->limit(8)->offset(0)->get();
        $case = Cases::orderby('id', 'desc')->get();
        $view = $this->ismobile ? 'Home/cases_phone' : 'Home/cases_pc';
        
        return view($view, compact('case', 'case_all'));
    }
    
    public function casedetail() {
        $case_id = Input::get('id');
        $case = Cases::where('id', $case_id)->first();
        
        return view('Home/casedetail', compact('case'));
    }
    
    public function news() {
        $topnews = News::orderby('id', 'desc')->take(2)->get();
        $news = News::orderby('id', 'desc')->paginate(4);
        $view = $this->ismobile ? 'Home/news_phone' : 'Home/news_pc';
        
        return view($view, compact('news', 'topnews'));
    }
    
    public function newsdetailajax() {
        $news = News::where('id', Input::get('id'))->first();
        return $news;
    }
    
    public function newsdetail() {
        $news_id = Input::get('id');
        $news = News::where('id', $news_id)->first();
        $news_prev = News::where('id', '<', $news_id)->orderby('id', 'desc')->first();
        $news_next = News::where('id', '>', $news_id)->orderby('id', 'asc')->first();
        
        return view('Home/newsdetail', compact('news', 'news_prev', 'news_next'));
    }
    
    public function service() {
        $partner = Partner::orderby('level', 'desc')->get();
        $service_web = Service::where('key', 'web')->first();
        $service_mobile = Service::where('key', 'mobile')->first();
        $service_app = Service::where('key', 'app')->first();
        $view = $this->ismobile ? 'Home/service_phone' : 'Home/service_pc';
        
        return view($view, compact('partner', 'service_web', 'service_mobile', 'service_app'));
    }
}

?>