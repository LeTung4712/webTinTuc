<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;
    protected  $fillable = [
        'category_id',
        'name',
        'unsigned_name',
    ];

    public function category() //xem newsType thuộc category nào
    {
        return $this->belongsTo(Category::class);
    }

    public function news() //xem newsType có những news nào
    {
        return $this->hasMany(News::class);
    }
}
