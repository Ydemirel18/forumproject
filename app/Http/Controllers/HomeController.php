<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\articles;
use App\Models\categories;
use App\Models\users;

class HomeController extends Controller
{
    public function index()
    {       
            $categories = categories::get();
            $articles = articles::with('user')->orderBy('id', 'desc')->paginate(10);
            return view('home', ['articles'=>$articles , 'categories'=>$categories]);
    }
}
