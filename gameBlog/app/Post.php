<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    protected $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User'); //a single post that belongs to a user
    }
}
