<?php
/*
 * this is the model for table "ct_admin"
 * the timestamp info is not available in this model
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
    public $timestamps = false;
    protected $table = "ct_admin";
    protected $guarded = [];
}


?>