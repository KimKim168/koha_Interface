<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideosPosition extends Model
{
    use HasFactory;
    protected $table = "videos_positions";
    protected $guarded = [];
}