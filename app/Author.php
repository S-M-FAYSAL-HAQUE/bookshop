<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
      'author_name',
      'author_bio'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
