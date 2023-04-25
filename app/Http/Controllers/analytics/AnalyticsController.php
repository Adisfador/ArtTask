<?php

namespace App\Http\Controllers\analytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\LikesUsers;
use App\Models\Views;

class AnalyticsController extends Controller
{
    public function likes(Request $request)
    {
        $Likes['article_id'] = $request->get('id');
        $LikesUsers['article_id'] = $request->get('id');
        $LikesUsers['ip'] = $request->ip();

        $arr = Likes::select('likes_count', 'likes.article_id', 'ip')
            ->leftJoin('likes_users', 'likes.article_id', '=', 'likes_users.article_id')
            ->where('likes.article_id', $Likes['article_id'])
            ->get();

        if (!isset($arr->first()->likes_count)) {
            $Likes['likes_count'] = '1';

            Likes::create($Likes);
            LikesUsers::create($LikesUsers);
        } elseif (isset($arr->first()->ip) && $arr->first()->ip == $LikesUsers['ip']) {
            $Likes['likes_count'] = $arr->first()->likes_count-1;
            Likes::where('article_id', $Likes['article_id'])->update($Likes);

            LikesUsers::where('ip',$LikesUsers['ip'])->where('article_id',$LikesUsers['article_id'])->delete();
        } else {
            $Likes['likes_count'] = $arr->first()->likes_count+1;
            Likes::where('article_id', $Likes['article_id'])->update($Likes);
            LikesUsers::create($LikesUsers);
        }

        return $Likes['likes_count'];
    }

    public function views(Request $request)
    {
        $views['article_id'] = $request->get('id');

        $arr = Views::select('count')
        ->where('article_id', $views['article_id'])
        ->get();

        if (!isset($arr->first()->count)) {
            $views['count']='1';
            Views::create($views);
        }else{
            $views['count']=1+$arr->first()->count;
            Views::where('article_id', $views['article_id'])->update($views);
        }
        return $views['count'];
    }
}
