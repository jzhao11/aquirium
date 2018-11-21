<?php
/*
 * this is the model for table "message"
 * the timestamp info is available in this model
 */

namespace App\Models;
use Baum\Node;

class Message extends Node {
    protected $table = "message";
    protected $guarded = [];
}

?>