<?php
/*
 * this is the model for table "category"
 * the timestamp info is not available in this model
 * the parent class is Node instead of Model
 * this model uses nested set as data structure
 */

namespace App\Models;
use Baum\Node;

class Category extends Node {
    public $timestamps = false;
    protected $table = "category";
    protected $guarded = [];
}



?>