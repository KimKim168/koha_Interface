<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCardPosition extends Model
{
    use HasFactory;
    protected $table = "member_cards_positions";
    protected $guarded = [];
}