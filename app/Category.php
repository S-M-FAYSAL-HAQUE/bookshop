<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'category_description',
        'parent_id',
        'status'
    ];

    public function scopeParentName($query,$id)
    {
        return $query->where('id', $id)->get()->pluck('name')->implode(',');
    }
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
