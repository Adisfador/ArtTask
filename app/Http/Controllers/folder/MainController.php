<?php

namespace App\Http\Controllers\folder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class MainController extends Controller
{
    public function index(Request $request)
    {

        $arr = Article::select('title', 'descr', 'img_mini', 'slug', 'likes_count', 'count', 'articles.id', 'likes_users.ip', "count")
            ->descrs()
            ->likes()
            ->views()
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get();

        $ip = $request->ip();
        return view("web.main.main", compact("arr", "ip"));
    }
}
