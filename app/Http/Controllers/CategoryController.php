<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article_categories;
use App\Models\categories;
use App\Models\articles;
use App\Models\users;

class CategoryController extends Controller
{
    public function index($category_id)
    {
        $categories = categories::get();
        $article_categories = article_categories::with('articles')->where("category_id", "$category_id")->orderBy('article_id','DESC')->paginate(10);
        $category_name = categories::select("category")->where("id","$category_id")->get();
        $this->getUser($article_categories); 
        return view('category', ['article_categories'=>$article_categories ,'category_name'=>$category_name[0]->category, 'categories'=>$categories]);
    }

    public function getUser($article_categories){
        foreach($article_categories as $article)
        {
            $userid = $article->articles->user_id;
            $user = users::where("id",$userid)->get();
            $article->name=$user[0]['name'];
            $article->id = $user[0]['id'];
        }
    }
}
