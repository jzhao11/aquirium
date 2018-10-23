<?php
namespace App\Models;
use Baum\Node;

class Category extends Node {
    public $timestamps = false;
    protected $table = 'ct_category';
    protected $guarded = [];
}



?>