<?php
/*
 * this is the model for table "user"
 * the timestamp info is available in this model
 * the encryption of sensitive info is handled in controller
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = "user";
    protected $guarded = [];
}



?>