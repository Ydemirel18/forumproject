<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{

    protected $fillable = ['comment','article_id','user_id']; 

    public function article()
    {
        return $this->belongsTo('App\Models\articles','article_id','id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\users','user_id','id');
    }
}
