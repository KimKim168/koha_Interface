<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCards extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table ='member_cards';
    public function position(){
        return $this->belongsTo(MemberCardPosition::class, 'position', 'name');
    }

    public function user(){
        return $this->belongsTo(User::class, 'create_by_user_id', 'id');
    }
}