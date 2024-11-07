<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "gallery";

    public function position(){
        return $this->belongsTo(GalleryPosition::class, 'position', 'name');
    }

    public function user(){
        return $this->belongsTo(User::class, 'create_by_user_id', 'id');
    }
}
