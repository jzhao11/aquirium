<?php
namespace App\Http\Controllers\Home;

class UserController extends ExtendedController {
    
    public function retrieveDetail($id) {
        return "UserController/retrieveDetail".$id;
    }
    
    public function createDetail() {
        return "UserController/createDetail";
    }
    
    public function updateDetail($id) {
        return "UserController/updateDetail";
    }
    
    public function retrieve() {
        return "UserController/retrieve";
    }
    
    public function create() {
        return "UserController/create";
    }
    
    public function update($id) {
        return "UserController/update";
    }
    
    public function delete($id) {
        return "UserController/delete";
    }
}


?>