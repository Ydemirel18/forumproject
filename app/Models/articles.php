<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $fillable = ['content_title','content_description','content','user_id']; 
    
    public function comment()
    {
         return $this->hasMany('App\Models\comments', 'article_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\users','user_id','id');
    }

    public function article_categories()
    {
        return $this->belongsTo('App\Models\article_categories','article_id','id');
    }
}
