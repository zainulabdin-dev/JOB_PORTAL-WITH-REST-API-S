<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $fillable = ["title","description","desgination","location","job_time","company_name","salary","user_id","type_id"];
function jobtype(){
    return $this->belongsTo(jobtype::class,'id');
}

function user(){
    return $this->belongsTo(User::class,'id');
}

    }
