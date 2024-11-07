<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'cards';

    // public function position(){
    //     return $this->belongsTo(PagePosition::class, 'position', 'name');
    // }

    public function user(){
        return $this->belongsTo(User::class, 'create_by_user_id', 'id');
    }
}
