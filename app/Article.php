<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
