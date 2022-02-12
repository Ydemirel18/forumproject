<?php

namespace App\Http\Controllers;
use App\Models\articles;
use App\Models\comments;
use App\Models\categories;
use App\Models\article_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index($articleid)
    {
        $articles = articles::with('user')->where('id', "$articleid")->limit(1)->get();
        $comments=comments::with('user')->where('article_id',"$articleid")->get();
        $categories=categories::get();
        return view('article', ['articles'=>$articles,'categories'=>$categories,'comments'=>$comments]);
    }
    public function create(request $request)
    {   
        if(Auth::check())
        {
            $contenttitle=$request->articlecontenttitle;
            $content=htmlspecialchars($request->articlecontent);
            $contentdescription=$request->articlecontentdescription;
            $contentcategory=$request->categories;
            $userid = Auth::user()->id;
            $articlecreate=articles::firstOrCreate(
                [
                    'content_title'=>"$contenttitle",
                    'content_description'=>"$contentdescription",
                    'content'=>"$content",
                    'user_id'=>$userid
                ]
            );
            foreach($contentcategory as $category)
            {
                $categorycreate=article_categories::firstOrCreate(
                    [
                        'article_id'=>$articlecreate->id,
                        'category_id'=>$category
                    ]);
            }
           
            return redirect('/profile');
        }
    }
    public function delete($id)
    {
        $articles=articles::where('id',$id)->get();
        if(count($articles)>0)
        {
            $articlecommentsdelete=comments::where('article_id',$id)->delete();
            $articlecategorydelete=article_categories::where('article_id',$id)->delete();
            $articledelete = articles::where('id',$id)->delete();
        }
        return redirect('/profile'); 
    }
    public function update($articleid,request $request)
    {
        if($request->has('_token'))
        {
            $id = Auth::user()->id;
            $articlecontenttitle=$request->articlecontenttitle;
            $articlecontentdescription=$request->articlecontentdescription;
            $articlecontent=htmlspecialchars($request->articlecontent);
            $articlesupdate = articles::where([['user_id', "$id"],['id' ,"$articleid"]])->update(array('content_title'=>"$articlecontenttitle",'content'=>"$articlecontent",'content_description'=>"$articlecontentdescription"));
            return redirect('/profile');
        }
        else
        {
            $id = Auth::user()->id;
            $articles = articles::where([['user_id', "$id"],['id' ,"$articleid"]])->limit(1)->get();
            return view('articleupdate', ['articles'=>$articles]); 
        }
    }
}
