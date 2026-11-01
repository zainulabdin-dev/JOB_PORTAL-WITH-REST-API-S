<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class applie extends Model
{
     protected $fillable = ['name','email','contact','job_type','description','user_id','job_id'];

function user(){
     return $this->belongsTo(User::class,'id');
}
function job(){
     return $this->belongsTo(job::class,'id');
}
     }
