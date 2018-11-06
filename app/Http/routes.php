<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It"s a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", function () {
    return view("welcome");
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(["middleware" => ["web"]], function () {
    //
});



/***********************************
 ***        author: zhao         ***
 ***********************************/


/*
 * start of HomeController
 */
Route::group(["namespace" => "Home"], function(){
    Route::get("/", "HomeController@index");
    Route::get("/public", "HomeController@index");
    Route::any("/index", "HomeController@index");
    
    Route::any("/about", "HomeController@about");
    Route::any("/personal", "HomeController@personal");
    Route::any("/logindetail", "HomeController@logindetail");
    
    Route::any("/test", "HomeController@test");
    Route::any("/news", "HomeController@news");
    Route::any("/newsdetail", "HomeController@newsdetail");
    Route::any("/cases", "HomeController@cases");
    Route::any("/casedetail", "HomeController@casedetail");
});
/*
 * end of HomeController
 */

/*
 * start of CategoryController
 */
Route::group(["namespace" => "Home"], function(){
    Route::any("/categoryretrieve", "CategoryController@categoryretrieve");
    Route::any("/categorycreate", "CategoryController@categorycreate");
    Route::any("/categoryupdate/{id}", "CategoryController@categoryupdate");
    Route::any("/categorydelete/{id}", "CategoryController@categorydelete");
    Route::any("/categorycreatedetail", "CategoryController@categorycreatedetail");
    Route::any("/categoryupdatedetail/{id}", "CategoryController@categoryupdatedetail");
});
/*
 * end of CategoryController
 */

/*
 * start of ItemController
 */
Route::group(["namespace" => "Home"], function(){
    Route::any("/itemretrievedetail/{id}", "ItemController@itemretrievedetail");
    Route::any("/itemcreatedetail", "ItemController@itemcreatedetail");
    Route::any("/itemupdatedetail/{id}", "ItemController@itemupdatedetail");
    Route::any("/itemretrieve", "ItemController@itemretrieve");
    Route::any("/itemretrievebyuser/{user_id}", "ItemController@itemretrievebyuser");
    Route::any("/itemcreate", "ItemController@itemcreate");
    Route::any("/itemupdate/{id}", "ItemController@itemupdate");
    Route::any("/itemdelete/{id}", "ItemController@itemdelete");
});
/*
 * end of ItemController
 */

/*
 * start of UserController
 */
Route::group(["namespace" => "Home"], function(){
    Route::any("/userretrievedetail/{id}", "UserController@retrieveDetail");
    Route::any("/usercreatedetail", "UserController@createDetail");
    Route::any("/userupdatedetail/{id}", "UserController@updateDetail");
    Route::any("/userretrieve", "UserController@retrieve");
    Route::any("/usercreate", "UserController@create");
    Route::any("/userupdate/{id}", "UserController@update");
    Route::any("/userdelete/{id}", "UserController@delete");
});
/*
 * end of UserController
 */

/*
 * start of back-end
 */
//AdminController
Route::group(["namespace" => "Admin", "prefix" => "admin"], function(){
    
    /*
     * signin and signout
     */
    Route::get("/", "AdminController@index");
    Route::any("/signin", "AdminController@signin");
    Route::get("/signout", "AdminController@signout");
    Route::get("/presignup", "AdminController@presignup");
    Route::any("/signup", "AdminController@signup");
    Route::any("/resetpre", "AdminController@resetpre");
    Route::any("/sendemail", "AdminController@sendemail");
    Route::any("/resetview", "AdminController@resetview");
    Route::any("/resetsave", "AdminController@resetsave");
    
    /*
     * table ct_address
     */
    Route::any("/addressretrieve", "AdminController@addressretrieve");
    Route::any("/addressupdate/{id}", "AdminController@addressupdate");
    Route::any("/addresscreate", "AdminController@addresscreate");
    Route::any("/addresssave/{action}/{id}", "AdminController@addresssave");
    
    /*
     * table ct_multi
     */
    Route::any("/multiretrieve", "AdminController@multiretrieve");
    Route::any("/multiupdate/{id}", "AdminController@multiupdate");
    Route::any("/multicreate", "AdminController@multicreate");
    Route::any("/multisave/{action}/{id}", "AdminController@multisave");
    Route::post("/multiupload", "AdminController@multiupload");
    
    /*
     * table ct_case
     */
    Route::any("/caseretrieve", "AdminController@caseretrieve");
    Route::any("/caseupdate/{id}", "AdminController@caseupdate");
    Route::any("/casecreate", "AdminController@casecreate");
    Route::any("/casesave/{action}/{id}", "AdminController@casesave");

    /*
     * table ct_news
     */
    Route::any("/newsretrieve", "AdminController@newsretrieve");
    Route::any("/newsupdate/{id}", "AdminController@newsupdate");
    Route::any("/newscreate", "AdminController@newscreate");
    Route::any("/newssave/{action}/{id}", "AdminController@newssave");
});

//CarouselController
Route::group(["namespace" => "Admin", "prefix" => "admin"], function(){
    Route::any("/carouselretrieve", "CarouselController@carouselretrieve");
    Route::any("/carouselupdate/{id}", "CarouselController@carouselupdate");
    Route::any("/carouselcreate", "CarouselController@carouselcreate");
    Route::any("/carouselsave/{action}/{id}", "CarouselController@carouselsave");
});

//ChartController
Route::group(["namespace" => "Admin", "prefix" => "admin"], function(){
    Route::any("/testchart", "ChartController@testchart");
    Route::any("/usercreatedbydaychart", "ChartController@usercreatedbydaychart");
    Route::any("/videobydaychart", "ChartController@videobydaychart");
    Route::any("/balanceforexpensebydaychart", "ChartController@balanceforexpensebydaychart");
    Route::any("/balanceforexpensebytypechart", "ChartController@balanceforexpensebytypechart");
    Route::any("/revenuebytypechart", "ChartController@revenuebytypechart");
    
    Route::any("/commentbydaychart", "ChartController@commentbydaychart");
    Route::any("/actionbyuserchart", "ChartController@actionbyuserchart");
});

/*
 * end of back-end
 */



?>