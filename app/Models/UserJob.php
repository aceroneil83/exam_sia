<?php

//Models deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model{ 

 public $timestamps = false; // <-- para dili na need ang updated at @ created at column

 protected $primaryKey = 'jobId'; //<-- this is a primary key

//name of table
 protected $table = 'tbluserjob';

 // column sa table
 protected $fillable = [

 'jobName'
 ];
 }