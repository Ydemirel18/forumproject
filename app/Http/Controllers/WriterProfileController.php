<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\articles;

class WriterProfileController extends Controller
{
    public function index($writer_id)
    {
        $articles = users::with('articles')->where('id', "$writer_id")->get();
        return $articles;
        $comments=comments::with('users')->where('article_id',"$articleid")->get();
        $categories=categories::get();
        return view('article', ['articles'=>$articles,'categories'=>$categories,'comments'=>$comments]);
    }
}
