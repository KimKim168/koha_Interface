<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingPosition extends Model
{
    use HasFactory;
    protected $table = "headings_positions";
    protected $guarded = [];
}