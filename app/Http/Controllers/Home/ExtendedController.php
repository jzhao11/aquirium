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
}


?>