<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //project_id	user_id
    protected $table = "project_user";
    
    protected $fillable = [
    	'project_id',
    	'user_id',
    ];
}
