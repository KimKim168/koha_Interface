<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pages() {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }

    public function parent() {
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }
}