<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newsCategory(){
        return $this->belongsTo(newsCategory::class, 'news_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'create_by_user_id', 'id');
    }
}