<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Models\articles', 'user_id','id');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Models\comments', 'user_id','id');
    }
}
