<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\articles;
use App\Models\users;

class HomeController extends Controller
{
    public function index()
    {
            $articles = articles::with('user')->orderBy('id', 'desc')->paginate(10);
            return view('home', ['articles'=>$articles]);
    }
}
