<?php
/*
 * this is the model for table "about"
 * the timestamp info is not available in this model
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class About extends Model {
    public $timestamps = false;
    protected $table = 'about';
    protected $guarded = [];
}

?>