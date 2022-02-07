<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article_categories extends Model
{
    protected $table = 'article_categories';

    public function articles()
    {
         return $this->hasMany('App\Models\articles', 'article_id','id');
    }
    public function categories()
    {
         return $this->hasMany('App\Models\categories', 'category_id','id');
    }
}
