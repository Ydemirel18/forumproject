<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public function article()
    {
        return $this->hasMany('App\Models\articles', 'user_id','id');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Models\comments', 'user_id','id');
    }
}
