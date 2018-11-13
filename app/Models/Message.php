<?php
/*
 * this is the model for table "ct_message"
 * the timestamp info is available in this model
 */

namespace App\Models;
use Baum\Node;

class Message extends Node {
    protected $table = "ct_message";
    protected $guarded = [];
}

?>