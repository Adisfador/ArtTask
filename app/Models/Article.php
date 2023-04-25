<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function scopeLikes($query)
    {
        return $query->leftJoin('likes', 'articles.id', '=', 'likes.article_id')
            ->leftJoin('likes_users', 'articles.id', '=', 'likes_users.article_id');
    }
    public function scopeDescrs($query)
    {
        return $query->join('article_descrs', 'articles.id', '=', 'article_descrs.article_id');
    }
    public function scopeViews($query)
    {
        return $query->leftJoin('views', 'articles.id', '=', 'views.article_id');
    }
    public function scopeTagRel($query)
    {
        return $query->join('tag_relations', 'articles.id', '=', 'tag_relations.article_id');
    }
}
