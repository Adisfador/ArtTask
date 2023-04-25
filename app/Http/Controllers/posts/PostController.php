<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tags;
use App\Models\Comments;

class PostController extends Controller
{
    public function index($slug, Request $request)
    {

        $arr = Article::select('title', 'descr', 'slug', 'likes_count', 'count', 'articles.id', 'likes_users.ip', 'img')
            ->descrs()
            ->likes()
            ->views()
            ->where('slug', $slug)
            ->get();

        $ip = $request->ip();
        $post = $arr->first();
        $tags = Tags::select('tag')
            ->tagRel()
            ->where('article_id', $post->id)
            ->get();

        $comments = Comments::select('theme', 'text', 'created_at')
            ->where('article_id', $post->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("web.posts.post", compact("post", "tags", "ip", "comments"));
    }

    public function comments(Request $request)
    {
        $request->validate([
            'theme' => 'required|min:2|max:100',
            'text' => 'required|min:4|max:500',
        ]);

        $comment['theme'] = $request->get('theme');
        $comment['text'] = $request->get('text');
        $comment['article_id'] = $request->get('article_id');
        Comments::create($comment);

        return  "<div class='alert alert-success' role='alert'>
        Ваш комментарий успешно отправлен!
      </div>";
    }
}
