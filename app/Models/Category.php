<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class,'id','parent_id');
    }
}