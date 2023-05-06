<?php

//Models deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{ 

 public $timestamps = false; // <-- para dili na need ang updated at @ created at column

 protected $primaryKey = 'id'; //<-- this is a primary key

//name of table
 protected $table = 'employees';

 // column sa table
 protected $fillable = [

 'first_name', 'last_name', 'id'
 ];
 }