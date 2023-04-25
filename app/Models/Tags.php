<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function scopeTagRel($query)
    {
        return $query->join('tag_relations', 'tag_relations.tag_id', '=', 'tags.id');
    }
}
