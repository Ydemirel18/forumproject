<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\articles;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            $id = Auth::user()->id;
            $articles = articles::where('user_id', "$id")->orderBy('id', 'desc')->limit(10)->get();
            return view('profile', ['articles'=>$articles]);
    }
}
