<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected  $table = [
        'content',
        'user_id',
        'news_id',
    ];

    public function user() //xem comment thuộc user nào
    {
        return $this->belongsTo(User::class);
    }
    public function news() //xem comment thuộc news nào
    {
        return $this->belongsTo(News::class);
    }
}
