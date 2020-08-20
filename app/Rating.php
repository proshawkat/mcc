<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'from', 'to', 'like_dislike', 'status'
    ];
}
