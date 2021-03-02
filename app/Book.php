<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'book_title',
        'book_description',
        'quantity',
        'book_photo',
        'publisher_id',
        'price'
    ];


    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
