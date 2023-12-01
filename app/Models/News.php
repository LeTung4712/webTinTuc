<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected  $fillable = [
        'title',
        'unsigned_title',
        'description',
        'content',
        'image',
        'author',
        'trending',
        'view',
        'news_type_id',
    ];

    public function newsType() //xem news thuộc newsType nào
    {
        return $this->belongsTo(NewsType::class); 
    }

    public function comment() //xem news có những comment nào
    {
        return $this->hasMany(Comment::class);
    }
}
