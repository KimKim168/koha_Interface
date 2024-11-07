<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardPosition extends Model
{
    use HasFactory;
    protected $table = "cards_positions";
    protected $guarded = [];
}
