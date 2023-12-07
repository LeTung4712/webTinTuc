<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected  $fillable = [ 
        'name',
        'unsigned_name',
        'image',
    ];

    public function newsType() //lấy ra các newsType thuộc category
    {
        return $this->hasMany(NewsType::class);
    }

    public function news() //lấy ra các news thuộc category
    {
        return $this->hasManyThrough(News::class, NewsType::class);
    }
}
