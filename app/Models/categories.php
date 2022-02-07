<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    public function article_categories()
    {
        return $this->belongsTo('App\Models\article_categories','category_id','id');
    }
}
