<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\articles;
use App\Models\categories;

class WriterProfileController extends Controller
{
    public function index($writer_id)
    {
        $userarticles = users::with('articles')->where('id', "$writer_id")->get();
        $categories=categories::get();
        return view('writerprofile', ['userarticles'=>$userarticles,'categories'=>$categories]);
    }
}
