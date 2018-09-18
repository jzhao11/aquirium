<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the 'web' middleware group to every route
| it contains. The 'web' middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});



/***********************************
 ***        author: zhao         ***
 ***********************************/


/*
 * start of front-end
 */
Route::group(['namespace' => 'Home'], function(){
    Route::get('/', "HomeController@index");
    Route::get('/public', "HomeController@index");
    
    Route::any("/index", "HomeController@index");
    Route::any("/about/{id}", "HomeController@about");
    
    Route::any("/news", "HomeController@news");
    Route::any("/newsdetail", "HomeController@newsdetail");
    Route::any("/newsdetailajax", "HomeController@newsdetailajax");
    
    Route::any("/cases", "HomeController@cases");
    Route::any("/casedetail", "HomeController@casedetail");
    
    Route::any("/contact", "HomeController@contact");
    Route::any("/contactcreate", "HomeController@contactcreate");
    
    Route::any("/service", "HomeController@service");
});
/*
 * end of front-end
 */



/*
 * start of back-end
 */
//AdminController
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    
    /*
     * signin and signout
     */
    Route::get('/', 'AdminController@index');
    Route::any('/signin', 'AdminController@signin');
    Route::get('/signout', 'AdminController@signout');
    Route::get('/presignup', 'AdminController@presignup');
    Route::any('/signup', 'AdminController@signup');
    Route::any('/resetpre', 'AdminController@resetpre');
    Route::any('/sendemail', 'AdminController@sendemail');
    Route::any('/resetview', 'AdminController@resetview');
    Route::any('/resetsave', 'AdminController@resetsave');
    
    /*
     * legal
     */
    Route::any('/termsandconditions', 'AdminController@termsandconditions');
    Route::any('/privacyandpolicy', 'AdminController@privacyandpolicy');
    Route::any('/help', 'AdminController@help');
    Route::any('/faq', 'AdminController@faq');
    Route::any('/error/{param}', 'AdminController@error');
    
    /*
     * table ct_adminuser
     */
    Route::any('/adminuserretrieve', 'AdminController@adminuserretrieve');
    Route::any('/adminuserupdate/{id}', 'AdminController@adminuserupdate');
    Route::any('/adminusercreate', 'AdminController@adminusercreate');
    Route::any('/adminusersave/{action}/{id}', 'AdminController@adminusersave');
    
    /*
     * table ct_housing
     */
//     Route::any('/housingretrieve', 'AdminController@housingretrieve');
//     Route::any('/housingupdate/{id}', 'AdminController@housingupdate');
//     Route::any('/housingcreate', 'AdminController@housingcreate');
//     Route::any('/housingsave/{action}/{id}', 'AdminController@housingsave');
//     Route::any('/housingajax/{action}', 'AdminController@housingajax');
    
    /*
     * table ct_report
     */
    Route::any('/reportretrieve', 'AdminController@reportretrieve');
    Route::any('/reportupdate/{id}', 'AdminController@reportupdate');
    Route::any('/reportcreate', 'AdminController@reportcreate');
    Route::any('/reportsave/{action}/{id}', 'AdminController@reportsave');
    
    /*
     * table ct_address
     */
    Route::any('/addressretrieve', 'AdminController@addressretrieve');
    Route::any('/addressupdate/{id}', 'AdminController@addressupdate');
    Route::any('/addresscreate', 'AdminController@addresscreate');
    Route::any('/addresssave/{action}/{id}', 'AdminController@addresssave');
    
    /*
     * table ct_multi
     */
    Route::any('/multiretrieve', 'AdminController@multiretrieve');
    Route::any('/multiupdate/{id}', 'AdminController@multiupdate');
    Route::any('/multicreate', 'AdminController@multicreate');
    Route::any('/multisave/{action}/{id}', 'AdminController@multisave');
    Route::post('/multiupload', 'AdminController@multiupload');
    
    /*
     * table ct_case
     */
    Route::any('/caseretrieve', 'AdminController@caseretrieve');
    Route::any('/caseupdate/{id}', 'AdminController@caseupdate');
    Route::any('/casecreate', 'AdminController@casecreate');
    Route::any('/casesave/{action}/{id}', 'AdminController@casesave');

    /*
     * table ct_news
     */
    Route::any('/newsretrieve', 'AdminController@newsretrieve');
    Route::any('/newsupdate/{id}', 'AdminController@newsupdate');
    Route::any('/newscreate', 'AdminController@newscreate');
    Route::any('/newssave/{action}/{id}', 'AdminController@newssave');
    
    /*
     * table ct_service
     */
    Route::any('/serviceretrieve', 'AdminController@serviceretrieve');
    Route::any('/serviceupdate/{id}', 'AdminController@serviceupdate');
    Route::any('/servicecreate', 'AdminController@servicecreate');
    Route::any('/servicesave/{action}/{id}', 'AdminController@servicesave');
    
    /*
     * table ct_advert
     */
    Route::any('/advertretrieve', 'AdminController@advertretrieve');
    Route::any('/advertupdate/{id}', 'AdminController@advertupdate');
    Route::any('/advertcreate', 'AdminController@advertcreate');
    Route::any('/advertsave/{action}/{id}', 'AdminController@advertsave');
    
    /*
     * table ct_nav
     */
    Route::any('/navretrieve', 'AdminController@navretrieve');
    Route::any('/navupdate/{id}', 'AdminController@navupdate');
    Route::any('/navcreate', 'AdminController@navcreate');
    Route::any('/navsave/{action}/{id}', 'AdminController@navsave');
    
    /*
     * table ct_partner
     */
    Route::any('/partnerretrieve', 'AdminController@partnerretrieve');
    Route::any('/partnerupdate/{id}', 'AdminController@partnerupdate');
    Route::any('/partnercreate', 'AdminController@partnercreate');
    Route::any('/partnersave/{action}/{id}', 'AdminController@partnersave');
    
    /*
     * table ct_about
     */
    Route::any('/aboutretrieve', 'AdminController@aboutretrieve');
    Route::any('/aboutsave', 'AdminController@aboutsave');
});

//CarouselController
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    /*
     * table ct_carousel
     */
    Route::any('/carouselretrieve', 'CarouselController@carouselretrieve');
    Route::any('/carouselupdate/{id}', 'CarouselController@carouselupdate');
    Route::any('/carouselcreate', 'CarouselController@carouselcreate');
    Route::any('/carouselsave/{action}/{id}', 'CarouselController@carouselsave');
});

//ChartController
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::any('/testchart', 'ChartController@testchart');
    Route::any('/usercreatedbydaychart', 'ChartController@usercreatedbydaychart');
    Route::any('/videobydaychart', 'ChartController@videobydaychart');
    Route::any('/balanceforexpensebydaychart', 'ChartController@balanceforexpensebydaychart');
    Route::any('/balanceforexpensebytypechart', 'ChartController@balanceforexpensebytypechart');
    Route::any('/revenuebytypechart', 'ChartController@revenuebytypechart');
    
    Route::any('/commentbydaychart', 'ChartController@commentbydaychart');
    Route::any('/actionbyuserchart', 'ChartController@actionbyuserchart');
});
/*
 * end of back-end
 */



?>