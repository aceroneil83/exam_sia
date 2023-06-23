<?php

//Models deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{ 

 public $timestamps = false; // <-- para dili na need ang updated at @ created at column

 protected $primaryKey = 'book_id'; //<-- this is a primary key

//name of table
 protected $table = 'tblbooks';

 // column sa table
 protected $fillable = [

 'book_name', 'year_publish', 'author_ID'
 ];
 }