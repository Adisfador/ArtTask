<?php

namespace App\Http\Controllers\folder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tags;

class CatalogController extends Controller
{
    public function index(Request $request){
        $arr = Article::select('title', 'descr','img','slug','likes_count','count','articles.id','likes_users.ip','count')
        ->descrs()
        ->likes()
        ->views()
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        $ip=$request->ip();
        $tags=Tags::select('tag')->get();
        return view("web.catalog.catalog", compact("arr","tags","ip"));
    }
    public function filter($tagname,Request $request){
        $arr = Article::select('title', 'descr','img','slug','likes_count','count','articles.id','likes_users.ip','count')
        ->descrs()
        ->tagRel()
        ->likes()
        ->views()
        ->join('tags', 'tags.id', '=', 'tag_relations.tag_id')
        ->where('tag',$tagname)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        $ip=$request->ip();
        $tags=Tags::select('tag')->get();

        return view("web.catalog.catalog", compact("arr","tags","tagname","ip"));
    }
}
